function formvalidation(){
    var empid=$('#empid').val();
    var fname=$('#fname').val();
    var lname=$('#lname').val();
    var designation=$('#designation').val();
    var dob=$('#dob').val();
    var gender=$('#gender').val();
    var doj=$('#doj').val();
    var email=$('#email').val();
    var password=$('#password').val();
    var cpassword=$('#cpassword').val();
    var passlength=$('#password').val().length;
    var contact=$('#contact').val();
    var contactlength=$('#contact').val().length;
    var address=$('#address').val();
    var pin=$('#pin').val();
    var pinlength=$('#pin').val().length;
    var district=$('#district').val();
    var state=$('#state').val();
    var country=$('#country').val();
    if(pasword != cpassword){
        alert("Password and confirm password does not match");
        return false;
    }
    if(empid==''){
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
    if(dob==''){
        alert("Please Enter your DOB");
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
        alert("Password length must be minimum 6 characters");
        return false;
    }
    if(contact==''){
        alert("Please Enter your Mobile number");
        return false;
    }
    if(contactlength<=9){
        alert("Mobile number must be 10 digit");
        return false;
    }
    if(contactlength>=11){
        alert("Mobile number must be 10 digit");
        return false;
    }
    if(address==''){
        alert("Please Enter your address");
        return false;
    }
    if(pin==''){
        alert("Please Enter your pin");
        return false;
    }
    if(pinlength<=5){
        alert("PIN must be 6 digit number");
        return false;
    }
    if(pinlength>=7){
        alert("PIN must be 6 digit number");
        return false;
    }
    if(district==''){
        alert("Please Enter your district");
        return false;
    }
    if(state==''){
        alert("Please Enter your state");
        return false;
    }
    if(country==''){
        alert("Please Enter your country");
        return false;
    }
}