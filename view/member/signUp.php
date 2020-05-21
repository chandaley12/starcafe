<?php
include_once('common.php');
?>




<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <script type="text/javascript" src="<?php echo(SC_JS_URL.'/signUp.js'); ?>"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<div id="wrapper">

    <section id="main">
        
        <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($this->request->getTitle()); ?></title>
    <style>
        table {
            width: 100%;
            border: 1px solid #444444;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #444444;
            padding: 10px;
        }
        .tag {
            width:30%;
        }
    </style>
</head>

<body>
    <form method="get" action="./index.php">
    <input type="hidden" name="action" value="signup">
    <input type="hidden" name="type" value="favorite_choice">
    <table>
        <thead>
            <tr>
                <th colspan="2">회원가입페이지</th>
            </tr>
        </thead>

<?php 
        /* 
            ,idx
            ,id
            ,pw
            ,email
            ,name
            ,nickname
            ,birth
            ,gender
            ,favorite
            ,mobile_phone
            ,profile_img
            ,event_agree
            ,location_agree
            ,update_date
            ,create_date
        */
?>
        <tbody>
            <tr>
                <td class="tag">아이디 :</td>
                <td><input type="text" name="id" onkeyup="checkID(this.value)"> 
                <span id="showCheckId"></span> </td>
            </tr>
            <tr>
                <td class="tag">비밀번호 :</td>
                <td><input type="password" id="pw" name="pw" onkeyup="checkPW(this.value)">
                <span id="showCheckPW"></span> </td>
            </tr>
            <tr>
                <td class="tag">비밀번호 확인 :</td>
                <td><input type="password" id="repw" name="" onkeyup="checkRePW(this.value)">
                <span id="showCheckRePW"></span> </td>
            </tr>
            <tr>
                <td class="tag">이메일 :</td>
                <td><input type="text" id="email" name="email" onkeyup="checkEmail(this.value)">
                <span id="showCheckEmail"></span> </td>
            </tr>
            <tr>
                <td class="tag">이름 :</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td class="tag">생년월일 :</td>
                <td><input type="date" name="birth"></td>
            </tr>
            <tr>
                <td class="tag">성별 :</td>
                <td>남자 <input type="radio" name="gender" value="m" checked> &nbsp;&nbsp; 여자 <input type="radio" name="gender" value="f"></td>
            </tr>
            <tr>
                <td class="tag">핸드폰번호 :</td>
                <td><input type="text" name="mobile_phone" id="mobile_phone" maxlength="13" onkeyup="checkPhoneNumber(this)">
                <span id="showCheckPhoneNumber"></span> </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>이벤트수신</td>
                <td><label><input type="checkbox" name="event_agree" value="1">동의</label></td>
            </tr>
            <tr>
                <td>지역데이터수집</td>
                <td><label><input type="checkbox" name="location_agree" value="1">동의</label></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" name="signUpBtn" value="회원가입하기"> </td>
            </tr>
        </tfoot>
    </table>
    </form>
</body>
<div>

<div>

</html>
