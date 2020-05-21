<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script type="text/JavaScript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
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
            border: 1px;
            border-collapse: collapse;
        }

        th{
            text-align : left;
            border: 1px;
            font-weight : bold;
            padding : 10px 10px 0px 10px;
            margin : 0px 0px 0px 0px;
        }
        td {
            font-size : 1.4em;
            border: 1px;
            padding: 10px 0px 0px 7px;
            margin : 0px 0px 0px 0px;
            width : 33%;
            text-align: left;
        }
        .td2 {
            font-size : 1.4em;
            border: 1px;
            padding: 10px 0px 0px 7px;
            text-align: left;
            margin : 0px 0px 0px 0px;
        }
        body{
            font-family: 'ChosunNm';
        } 
    </style>
</head>

<body>
    <form method="get" action="./index.php">
    <input type="hidden" name="action" value="signup">
    <input type="hidden" name="type" value="confirm">
    <?php
        echo('<input type="hidden" name="id" value="'.$_REQUEST['id'].'">');
        echo('<input type="hidden" name="pw" value="'.$_REQUEST['pw'].'">');
        echo('<input type="hidden" name="email" value="'.$_REQUEST['email'].'">');
        echo('<input type="hidden" name="name" value="'.$_REQUEST['name'].'">');
        echo('<input type="hidden" name="birth" value="'.$_REQUEST['birth'].'">');
        echo('<input type="hidden" name="gender" value="'.$_REQUEST['gender'].'">');
        echo('<input type="hidden" name="mobile_phone" value="'.$_REQUEST['mobile_phone'].'">');
        echo('<input type="hidden" name="event_agree" value="'.$_REQUEST['even_agree'].'">');
        echo('<input type="hidden" name="location_agree" value="'.$_REQUEST['location_agree'].'">');
    ?>
    <table>
    
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

<?php

/*
=== 선호음료 100 ===
* 커피      1
* 스무디    2
* 에이드    3
* 차        4
* 버블티    5
* 흑당      6

=== 커피 200 ===
* 에스프레소    1
* 아메리카노    2
* 카푸치노      3
* 카페라떼      4
* 마끼아또      5
* 모카초코      6

*/



?>

            <tr>
                <th colspan="3" style="font-size: 1.85em; padding-bottom: 20%; text-align : center;">Taste</th>
            </tr>

            <tr>
                <td  colspan="3" style="text-align : center; padding-bottom : 20% ">취향을 선택해주세요</td>
            </tr>
            

      
                <th colspan="3">선호음료</th>
            
            <tr>
                <td><label for="f101" id="l_f101" onclick="check_click(this);">#커피</label></td>
                <td><label for="f102" id="l_f102" onclick="check_click(this);">#스무디</label></td>
                <td><label for="f103" id="l_f103" onclick="check_click(this);">#에이드</label></td>
            </tr>
            <tr>
                <td><label for="f104" id="l_f104" onclick="check_click(this);">#차</label></td>
                <td><label for="f105" id="l_f105" onclick="check_click(this);">#버블티</label></td>
                <td><label for="f106" id="l_f106" onclick="check_click(this);">#흑당</label></td>
            </tr>
    </table> 
    <br><br>
    <table>       
                <th colspan="3">커피</th>
            
            <tr>
                <td class="td2"><label for="f201" id="l_f201" onclick="check_click(this);">#에스프레소</label></td>
                <td class="td2"><label for="f202" id="l_f202" onclick="check_click(this);">#아메리카노</label></td>                
            </tr>
            <tr>
                <td class="td2"><label for="f203" id="l_f203" onclick="check_click(this);">#카푸치노</label></td>
                <td class="td2"><label for="f204" id="l_f204" onclick="check_click(this);">#카페라떼</label></td>
            </tr>
            <tr>                
                <td class="td2"><label for="f205" id="l_f205" onclick="check_click(this);">#카페모카</label></td>
                <td class="td2"><label for="f206" id="l_f206" onclick="check_click(this);">#마끼아토</label></td>
            </tr>
    </table>    
    <br><br>
    <table>       
                <th colspan="3">논카페인</th>
            
            <tr>
                <td><label for="f301" id="l_f301" onclick="check_click(this);">#초콜릿</label></td>
                <td><label for="f302" id="l_f302" onclick="check_click(this);">#딸기</label></td>
                <td><label for="f303" id="l_f303" onclick="check_click(this);">#플레인</label></td>
            </tr>
            <tr>
                <td><label for="f304" id="l_f304" onclick="check_click(this);">#오렌지</label></td>
                <td><label for="f305" id="l_f305" onclick="check_click(this);">#레몬</label></td>
                <td><label for="f306" id="l_f306" onclick="check_click(this);">#자몽</label></td>
            </tr>
            <tr>
                <td><label for="f307" id="l_f307" onclick="check_click(this);">#바나나</label></td>
                <td><label for="f308" id="l_f308" onclick="check_click(this);">#복숭아</label></td>
                <td><label for="f309" id="l_f309" onclick="check_click(this);">#수박</label></td>
            </tr>
            <tr>
                <td><label for="f310" id="l_f310" onclick="check_click(this);">#망고</label></td>
                <td><label for="f311" id="l_f311" onclick="check_click(this);">#키위</label></td>
                <td><label for="f312" id="l_f312" onclick="check_click(this);">#청포도</label></td>
            </tr>
    </table>  
    <table>
            <tr>                
                <td class="td2"><label for="f313" id="l_f313" onclick="check_click(this);">#파인애플</label></td>
                <td class="td2"><label for="f314" id="l_f314" onclick="check_click(this);">#블루베리</label></td>
            </tr>
    </table> 
    <br><br>
    <table>       
                <th colspan="3">차</th>
            
            <tr>
                <td><label for="f401" id="l_f401" onclick="check_click(this);">#녹차</label></td>
                <td><label for="f402" id="l_f402" onclick="check_click(this);">#매실차</label></td>
                <td><label for="f403" id="l_f403" onclick="check_click(this);">#유자차</label></td>
            </tr>
            <tr>
                <td><label for="f404" id="l_f404" onclick="check_click(this);">#석류차</label></td>
                <td><label for="f405" id="l_f405" onclick="check_click(this);">#대추차</label></td>
                <td><label for="f406" id="l_f406" onclick="check_click(this);">#생강차</label></td>
            </tr>   
    </table>  
    <table>
            <tr>                
                <td class="td2"><label for="f407" id="l_f407" onclick="check_click(this);">#복분자차</label></td>
                <td class="td2"><label for="f408" id="l_f408" onclick="check_click(this);">#오미자차</label></td>
            </tr>
    </table>
    <br><br><br>

    

        <tfoot>
            <tr>
                <td colspan="2"> <input type="submit" value="취향선택하기"> </td>
            </tr>
        </tfoot>
    
    </form>
    <script>
        // var check_click = function(_this) {
        // if(_this.style.color == 'red'){
        //     _this.style.color = '#313f47';
        // }
        // else if(_this.style.color == '#313f47'){
        //     _this.style.color = 'red';
        // }        
        // };

        function check_click(_this) {
            console.log(_this.style.color);
        };
    </script>
</body>

<div>

<div>

</html>