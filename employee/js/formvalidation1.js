function formvalidation1(){
    var adminid=$('#adminid').val();
    var fname=$('#fname').val();
    var lname=$('#lname').val();
    var designation=$('#designation').val();
    var gender=$('#gender').val();
    var doj=$('#doj').val();
    var email=$('#email').val();
    var password=$('#password').val();
    var passlength=$('#password').val().length;
    var contact=$('#contact').val();
    var contactlength=$('#contact').val().length;
    if(adminid==''){
        alert("Please Enter your Employee ID");
        return false;
    }
    if(fname==''){
        alert("Please Enter your First name");
        return false;
    }
    if(lname==''){
        alert("Please Enter your last name");
        return false;
    }
    if(designation==''){
        alert("Please Enter your designation");
        return false;
    }
    if(gender==''){
        alert("Please Enter your Gender");
        return false;
    }
    if(doj==''){
        alert("Please Enter your Date of Joining");
        return false;
    }
    if(email==''){
        alert("Please Enter your Email");
        return false;
    }
    if(password==''){
        alert("Please Enter your Password");
        return false;
    }
    if(passlength<=5){
        alert("Password length should be minimum 6 characters");
        return false;
    }
    if(contact==''){
        alert("Please Enter your Mobile number");
        return false;
    }
    if(contactlength<=9){
        alert("Mobile number should be 10 digit");
        return false;
    }

}