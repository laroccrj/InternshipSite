<?php

class UserNotFoundException extends Exception { }
class UserExistsException extends Exception { }
class InvalidEmailException extends Exception { }
class BadLoginException extends Exception { }
class UserType
{
    const Student = "student";
    const Company = "company";
    const Admin = "admin";
}

class User 
{
    public $id;
    public $info;
    
    protected static function getConnection()
    {
        return new Mongo();
    }
    
    protected static function getCollection($conn)
    {
        return $conn->internship->users;
    }
    
    public static function getUsers($query)
    {
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
        
        $users = $coll->find($query);
        
        $conn->close();
        
        return $users;
    }
    
    public static function login($email, $password)
    {
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
        
        $query = array("email" => $email);
        
        $user = $coll->findOne($query);
        
        if(!$user)throw new BadLoginException("Email does not exist");
        
        if($user["password"] == md5($password))
        {
            if($user["type"] == UserType::Student)
                return new Student($user["_id"]);
                
            if($user["type"] == UserType::Admin)
                return new Admin($user["_id"]);
                
            if($user["type"] == UserType::Company)
                return new Company($user["_id"]);
        }
        else
        throw new BadLoginException("Incorrect Password");
    }
    
    function __construct($id)
    {
        $this->id = new MongoId($id);
        if(!$this->updateInfo())
            throw new UserNotFoundException("User not found");
    }
    
    protected static function userExists($email)
    {
        $conn = User::getConnection();
        $coll = User::getCollection($conn);

        $query = array("email" => $email);
        
        $info = $coll->findOne($query);
        
        $conn->close();
        
        if($info) return true;
        else return false;
    }
    
    protected function updateInfo()
    {
        $conn = User::getConnection();
        $coll = User::getCollection($conn);

        $query = array("_id" => $this->id);
        
        $info = $coll->findOne($query);
        
        $conn->close();
        
        if($info)
        {
            $this->info = $info;
            return true;
        }
        
        return false;
    }
    
    public static function checkLogin($expectedType, $rootDir)
    {
        //is user logged in
        if(!ISSET($_SESSION["user"]))
        {
            header("Location: ".$rootDir."index.php");
            return;
        }
        
        //are they the correct type
        if($_SESSION["user"]->info["type"] != $expectedType)
        {
            //if not, redirect them to according index
            switch($_SESSION["user"]->info["type"])
            {
                case(UserType::Student):
                    header("Location: ".$rootDir."student/index.php");
                    break;
                case(UserType::Admin):
                    header("Location: ".$rootDir."admin/index.php");
                    break;
                case(UserType::Company):
                    header("Location: ".$rootDir."company/index.php");
                    break;
            }
        }
    }
}

class Student extends User
{
    
    function __construct($id)
    {
        parent::__construct($id);
    }
    
    public static function newStudent($email, $password)
    {   
        if(User::userExists($email)) throw new UserExistsException();
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new InvalidEmailException();
            
        $domain = explode("@", $email);
        var_dump($domain);
        
        if($domain[1] != "alfredstate.edu")
            throw new InvalidEmailException();
        
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
     
        $student = array (
            "type" => UserType::Student,
            "email" => $email,
            "password" => md5($password),
            "verified" => false
        );
        
        $coll->insert($student);
        
        $conn->close();

        $to = $email;
        $subject = "Confirm Alfred State Email";
		$header = "From AlfredState InternShip Program";
        $message = "Please verify your email by going to this link: http://192.168.56.101/verify.php?id=".$student["_id"];
		mail($to,$subject,$message,$header);
        
        
        return new Student($student["_id"]);
    }

    public function verify()
    {
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
        
        $set = array('$set' => array("verified" => true));
        $query = array("_id" => $this->id);
        
        $coll->update($query, $set);
        
        $conn->close();
        
        $this->updateInfo();
    }
    
}
class Admin extends User
{
    function __construct($id)
    {
        parent::__construct($id);
    }
    
    public static function newAdmin($email, $password)
    {   
        if(User::userExists($email)) throw new UserExistsException();
        
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
        $admin = array (
            "type" => UserType::Admin,
            "email" => $email,
            "password" => md5($password)
        );
        
        $coll->insert($admin);
        
        $conn->close();
        
        return new Admin($admin["_id"]);
    }
}
class Company extends User
{

    function __construct($id)
    {
        parent::__construct($id);
    }
    
    public static function newCompany($email, $password, $name)
    {   
        if(User::userExists($email)) throw new UserExistsException();
        
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
        $company = array (
            "type" => UserType::Company,
            "name" => $name,
            "email" => $email,
            "password" => md5($password),
            "verified" => false
        );
        
        $coll->insert($company);
        
        $conn->close();
        
        return new Company($company["_id"]);
    }
    
    public function verify()
    {
        $conn = User::getConnection();
        $coll = User::getCollection($conn);
        
        $set = array('$set' => array("verified" => true));
        $query = array("_id" => $this->id);
        
        $coll->update($query, $set);
        
        $conn->close();
        
        $this->updateInfo();
    }

}