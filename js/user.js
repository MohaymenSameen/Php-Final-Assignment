var error = document.getElementById('error');
var Uemail = document.getElementById('email_address');
var Upass = document.getElementById('password');
var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function checkEmail()
{
    if(!re.test(Uemail.value))
    {  
        error.style.backgroundColor="#f44336";      
        error.innerHTML = "Unvalid email";        
    }
    else
    {
        error.style.backgroundColor="Green";    
        error.innerHTML = "Valid Email";
    }
}
