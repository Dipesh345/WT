function validate(){
    let name=document.forms['form']['fname'].value;
    if(name.length<8){
        alert("Length of name is too short");
        return false;
    }
    let password = document.forms['form']['fpass'].value;
    if(password.length <= 6){
        alert("Password Too Short");
        return false;
    } 
}
function validateEmail(emailID){
    var format=/^([A-Za-z0-9_/-/.])+\@([A-Za-z])+\.([A-Za-z]{2,4})$/;
    if(!emailID.value.match(format)){
        alert("Invalid Email Address");
        return false;
    }
}
