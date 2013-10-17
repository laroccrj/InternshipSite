<?php
	
class Internship
{
	
	public static function getConnection()
	{
		return new Mongo();
	}
	
	public static function getCollection($conn)
	{
		return $conn->internship->internships;
	}
	
	public static function getInternships()
	{
		$conn = Internship::getConnectino();
		$coll = Internship::getCollection($conn);
		
		$internships =  $coll->find();
		
		$conn->close();
		
		return $internships;
	}
	
	public static function getInternships($query)
	{
		$conn = Internship::getConnectino();
		$coll = Internship::getCollection($conn);
		
		$internships =  $coll->find($query);
		
		$conn->close();
		
		return $internships;
	}
	
	public static function newInternship($user, $contact, $contactEmail, $title, $desc, $semester, $year)
	{
		$internship = array(
			"user" => $user,
			"name" => $name,
			"contact" => $contact,
			"contactEmail" => $contactEmail,
			"title" => $title,
			"desc" => $desc,
			"semester" => $semester,
			"year" => $year,
			"open" => true,
			"posted" => date("U")
		)
		
		$conn = Internship::getConnectino();
		$coll = Internship::getCollection($conn);
		
		$coll->insert($internship);
		
		$conn->close();
		
		return new Internship($internship["_id"]);
	}
	
	private $id;
	public $info;
	
	function __construct($id)
	{
		$this->id = new MongoId($id);
	}
	
	private function updateInfo()
	{
		$conn = Internship::getConnectino();
		$coll = Internship::getCollection($conn);
		
		$this->info =  $coll->find(array("_id" => $this->id));
		
		$conn->close();
	}
	
	public function close()
	{
		$conn = Internship::getConnectino();
		$coll = Internship::getCollection($conn);
		
		$coll->update(array("_id" => $this->id), array('$set' => array("open" => false)));
		
		$conn->close();
	}
}