var email_address = document.getElementById('error');
var password = document.getElementById('password');

var Uemail = document.login.email_address;
var Upass = document.login.password;

function checkInput()
{
    if(Uemail.value.length <5)
    {        
        email_address.innerHTML = "Unvalid email";
    }    
}