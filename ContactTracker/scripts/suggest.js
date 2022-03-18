document.getElementById("suggest-form").onsubmit = validate;

function validate(){
    clearErrors();

    let valid = true;
    //validate info
    let name = document.getElementById("employee-name").value;
    if(name == ""){
        document.getElementById("err-name").style.display = "block";
        valid = false;
    }

    let email = document.getElementById("email").value;
    if(!validateEmail(email)){
        document.getElementById("err-email").style.display = "block";
        valid = false;
    }

    let suggestion = document.getElementById("suggestion").value;
    if(suggestion == ""){
        document.getElementById("err-suggestion").style.display = "block";
        valid = false;
    }

    //return false if any errors were found
    return valid;
}

function clearErrors(){
    let errors = document.getElementsByClassName("error");
    for(let i = 0; i < errors.length; i++){
        errors[i].style.display = "none";
    }
}

function validateEmail(email){
    let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return pattern.test(email);
}