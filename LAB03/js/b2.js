function validateAdd(){
    let fn = document.getElementById("firstname").value;
    let ln = document.getElementById("lastname").value;
    let em = document.getElementById("email").value;

    let fnFocus = document.getElementById("firstname");
    let lnFocus = document.getElementById("lastname");
    let emFocus = document.getElementById("email");

    let message = document.getElementById("errorMessage");
    message.style.color = "red";
    message.style.display = "none";

    if(fn === ""){
        message.innerHTML = "Please enter your First Name";
        message.style.display = "block";
        fnFocus.focus();
    }
    else if(ln === ""){
        message.innerHTML = "Please enter your Last Name";
        message.style.display = "block";
        lnFocus.focus();
    }
    else if(em === ""){
        message.innerHTML = "Please enter your Email";
        message.style.display = "block";
        emFocus.focus();
    }

    else if(!em.includes('@')){
        message.innerHTML = "Your Email is not correct";
        message.style.display = "block";
        emFocus.focus();
    }
    else{
        addStudent();
    }
}

function addStudent(){
    let firstName = document.getElementById("firstname").value;
    let lastName = document.getElementById("lastname").value;
    let email = document.getElementById("email").value;
    let studentTable = document.getElementById("studentTable");

    let row = studentTable.insertRow();
    let fnCell = row.insertCell(0);
    let lnCell = row.insertCell(1);
    let emailCell = row.insertCell(2);
    let actionCell = row.insertCell(3);

    fnCell.innerHTML = firstName;
    lnCell.innerHTML = lastName;
    emailCell.innerHTML = email;
    actionCell.innerHTML = '<button class="btn btn-danger btn-sm" onclick="deleteStudent(this)">Delete</button>';
}

function deleteStudent(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("studentTable").deleteRow(i);
  }

function clearTable(){
    let studentTable = document.getElementById("studentTable");
    var len = studentTable.rows.length; // len (Table Length) = Tất cả Row đang có trong bảng
    for(var i = 1; len > i; i++){ //Vòng lập for để xóa dần các phần tử (row) thứ 2 có trong bảng; len = số lượng sinh viên được tạo ra + 1 Nên mặc định i=1
        studentTable.deleteRow(1); //Xóa phần tử thứ 2 trong bảng (Vì phần tử đầu tiên là Tiêu đề)
    }
}

function clearInputV(){
    document.getElementById("firstname").value ="";
    document.getElementById("lastname").value ="";
    document.getElementById("email").value ="";
}

function clearError(){
    //Xóa ErrorMessage đã hiện khi User trỏ chuột vào Text Field
    document.getElementById("errorMessage").innerHTML = "";
}