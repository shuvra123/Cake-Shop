const form = document.getElementById("form");
const username = document.getElementById("username");
const password = document.getElementById("password");
// const submit = document.getElementById("login");

// document.querySelector("button").addEventListener("click",()=>{

//     // e.preventDefault();

//     check();

// });

function check(){

const usernamevalue = username.value.trim();
const passwordvalue = password.value.trim();

if(usernamevalue === '')
{
    setError(username, 'Name can not be blank');

}
else{
    setSuccess(username);
}


if(passwordvalue === '')
{
    setError(password, 'Name can not be blank');
}

else{
    setSuccess(password);
}
}

function setError(input, message){
    
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccess(input){
    const formControl = input.parentElement;
   
    formControl.className = 'form-control';
    
}
