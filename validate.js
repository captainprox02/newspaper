let flag = true;
let passwordStrongRegex = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*(?=.*[0-9]).*$/gm;

function checkDoc(doc){
    if(doc.length == 0){
        return false;
    }else{
        return true;
    }
}

function checkPassword(password){
    if(password.length == 0){
        return false;
    }
    if(passwordStrongRegex.test(password) == true){
        return true;
    }else{
        return false;
    }
}

function check(myform){
    
    let title = document.getElementById('title').value;
    let content = document.getElementById('content').value;
    let picture = document.getElementById('picture').value;
    let author = document.getElementById('author').value;
    let password = document.getElementById('password').value;

    if(checkDoc(title) == false){
        alert('Tiêu đề khum hợp lệ');
        flag = false;
    }

    else if(checkDoc(content) == false){
        alert('Nội dung khum hợp lệ');
        flag = false;
    }

    else if(checkDoc(picture) == false){
        alert('Link ảnh khum hợp lệ');
        flag = false;
    }

    else if(checkDoc(author) == false){
        alert('Tên tác giả khum hợp lệ');
        flag = false;
    }

    else if(checkPassword(password) == false){
        alert('Mật khẩu khum hợp lệ\nMật khẩu hợp lệ phải có ít nhất: \n8 kí tự ,\n1 chữ số, \nmột kí tự tin hoa, \nvà một kí tự đặc biệt');
        flag = false;
    }

    if(flag == false){
        flag = true;
        return false;
    }else{
        return true;
    }
}