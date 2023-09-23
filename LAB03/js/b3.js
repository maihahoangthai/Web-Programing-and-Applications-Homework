var displayMessage = document.getElementById("displayText");

function displayText(){
    let inputValue = document.getElementById("message").value;
    displayMessage.innerHTML = inputValue;
}

function changeColor(){
    let optionColor = document.getElementById("color").value;
    displayMessage.style.color = optionColor;
}

function setBold(){
    let option = document.getElementById("bold");
    if(option.checked){
        displayMessage.style.fontWeight = 'bold';
    }
    else{
        displayMessage.style.fontWeight = 'normal';
    }
}

function setItalic(){
    let option = document.getElementById("italic");
    if(option.checked){
        displayMessage.style.fontStyle = "italic";
    }
    else{
        displayMessage.style.fontStyle = "normal";
    }
}

function setUnderline(){
    let option = document.getElementById("underline");
    if(option.checked){
        displayMessage.style.textDecoration = "underline";
    }
    else{
        displayMessage.style.textDecoration = "none";
    }
}

function restoreBtn(){
    let option1 = document.getElementById("bold");
    let option2 = document.getElementById("italic");
    let option3 = document.getElementById("underline");

    if(option1.checked){
        option1.checked = false;
        setBold();
    }
    if(option2.checked){
        option2.checked = false;
        setItalic();
    }
    if(option3.checked){
        option3.checked = false;
        setUnderline();
    }
    document.getElementById("color").value = "Black";
    changeColor();
}