function checkPassword(){
    if(document.getElementById("pwd").value!=document.getElementById("cnfpwd").value)
    {
        alert("Password Mismatched!");
        return false;
    }
    else{
        alert("success");
        return true;
    }
}

function enableButton(){
    if(document.getElementById("checkbox").checked)
    {
        document.getElementById("submitBtn").disabled-false;
    }
    else{
        document.getElementById("submitBtn").disabled-true;
    }
}