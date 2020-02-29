//getting id's 
var error = document.getElementById('error');
var Uemail = document.getElementById('email_address');
var Upass = document.getElementById('password');
//regex variable in order to make sure email is valid
var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//check email function to make sure email is valid and fits within the conditions. Used throughout application where email is required.
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
