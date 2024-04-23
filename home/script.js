const form=document.qetElementById('form');
const username=document.qetElementById('name');
const email=document.qetElementById('email');
const password=document.qetElementById('password');
const cpassword=document.qetElementById('cpassword');

//error message function
//first parameter is input field and second is message to be displayed
function errorMsg(input, msg){
    const formControl=input.parentElement;
    // console.log(formControl);
    formControl.className="error";

}

//this validation should occur only when clicked on submit button
//event listener for submit button
//form variable
form.addEventListener("submit",function(e){
    e.preventDefault();
    if(username.value===""){
        errorMsg(username, "required");
    }
    else{
        successMsg();
    }
}
);