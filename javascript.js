$(document).ready(function() {

$("#newInternshipForm, #loginform, #adminform, #studentsignup, #companysignup").validate({
    rules: {
        companyName: "required",
        contactName: "required",
        contactEmail: { required: true, email: true },
        jobTitle: "required",
        semester: "required",
        year: "required",
        email: { required: true, email: true },
        password: { required: true, minlength: 6 },
        pass: { required: true, minlength: 6 },
        name: "required"
    }, 
    messages: {
        companyName: "Enter a company name",
        contactName: "Enter a contact name",
        contactEmail: "Enter a valid contact email",
        jobTitle: "Enter a job title",
        semester: "Enter a time period",
        year: "Select a year",
        email: "Enter a valid email address",
        password: { required: "Enter a password",
                    minlength: "Password must be at least 6 characters" },
        pass: { required: "Enter a password",
                minlength: "Password must be at least 6 characters" },
        name: "Enter a name"                  
    },
    errorLabelContainer: "#errors",
    wrapper: "li"
});

});