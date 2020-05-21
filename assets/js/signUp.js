function checkID(str) {
    if (str.length == 0) {
        document.getElementById("showCheckId").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showCheckId").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../model/member/checkID.php?q=" + str, true);
        xmlhttp.send();
    }
}

function noticeCheck(id, message) {
    let element = document.getElementById(id);
    element.innerHTML = "";
    element.innerHTML = message;
}

function isNumber(str) {
    let pattern_num = /[0-9]/; // 숫자
    let pattern_eng = /[a-zA-Z]/; // 문자
    let pattern_spc = /[~!@#$%^&*()_+|<>?:{}]/; // 특수문자
    let pattern_kor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/; // 한글체크
    if (
        pattern_num.test(str) &&
        !pattern_eng.test(str) &&
        !pattern_spc.test(str) &&
        !pattern_kor.test(str)
    ) {
        return true;
    } else {
        return false;
    }
}

function checkPW(password) {
    var checkNumber = password.search(/[0-9]/g);
    var checkEnglish = password.search(/[a-z]/gi);
    var checkSpecial = password.search(/[~!@#$%^&*()_+|<>?:{}]/);
    if (password.length < 8 || password.length > 20) {
        noticeCheck(
            "showCheckPW",
            "숫자와 영문자 조합으로 8~20자리를 사용해야 합니다."
        );
        return;
    } else if (checkNumber < 0 || checkEnglish < 0) {
        noticeCheck("showCheckPW", "숫자와 영문자를 혼용하여야 합니다.");
        return;
    } else if (checkSpecial < 0) {
        noticeCheck("showCheckPW", "특수문자가 포함되어야 합니다.");
        return;
    }
    else {
        noticeCheck("showCheckPW", "OK");
    }
}

function checkRePW(rePassword) {
    var password = document.getElementById("pw").value;
    if(rePassword == password) {
        noticeCheck("showCheckRePW", "OK");
    }
    else {
        noticeCheck("showCheckRePW", "비밀번호가 다릅니다.");
    }
}

function checkEmail(email) {
    let checkEmail = /^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/;
    if(checkEmail.test(email)) {
        noticeCheck("showCheckEmail", "OK");
    }
    else {
        noticeCheck("showCheckEmail", "올바르게 입력해주세요.");
    }
}
var autoHypenPhone = function(str){
    str = str.replace(/[^0-9]/g, '');
    var tmp = '';
    if( str.length < 4){
        return str;
    }else if(str.length < 7){
        tmp += str.substr(0, 3);
        tmp += '-';
        tmp += str.substr(3);
        return tmp;
    }else{              
        tmp += str.substr(0, 3);
        tmp += '-';
        tmp += str.substr(3, 4);
        tmp += '-';
        tmp += str.substr(7);
        return tmp;
    }

    return str;
}
function checkPhoneNumber(num) {
    console.log(this.value);
    mobile_phone = document.getElementById('mobile_phone');
    mobile_phone.value = autoHypenPhone( mobile_phone.value ) ;  
}