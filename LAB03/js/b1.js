function validateForm(){
    let email = document.getElementById("email").value;
    let pwd = document.getElementById("pwd").value;
    let msg = document.getElementById("errorMessage");
    let DisplayMsg = "";
    let emailFocus = document.getElementById("email");
    let pwdFocus = document.getElementById("pwd");

    if(email === ""){
        msg.style.display = "block";
        DisplayMsg = "Please enter your email";
        msg.innerHTML = DisplayMsg;
        emailFocus.focus();
        return false;
    }
    else if(pwd === ""){
        msg.style.display = "block";
        DisplayMsg = "Please enter your password";
        msg.innerHTML = DisplayMsg;
        pwdFocus.focus();
        return false;
    }
    else if(!email.includes('@')){
        msg.style.display = "block";
        DisplayMsg = "Your email is not correct";
        msg.innerHTML = DisplayMsg;
        emailFocus.focus();
        return false;
    }
    else if(pwd.length < 6){
        msg.style.display = "block";
        DisplayMsg = "Your password must contain at least 6 characters";
        msg.innerHTML = DisplayMsg;
        pwdFocus.focus();
        return false;
    }

    //Khi validate đúng, Display sẽ thiết lập lại thành None để ẩn ErrorMessage
    msg.style.display = "none";    
    return true;
}

function clearError(){
    //Xóa ErrorMessage đã hiện khi User trỏ chuột vào Text Field
    document.getElementById("errorMessage").innerHTML = "";
}