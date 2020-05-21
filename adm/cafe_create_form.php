<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/JavaScript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

    <style type="text/css">
        
        .images_wraper img {
            max-width:30%;
            border: 1px solid black
        }
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
            width: 30%;
        }
    </style>

<script language="javascript">

    $(document).ready(function () {
        $("#cafe_images").on("change", handleImgsFilesSelect);
    });

    function handleImgsFilesSelect(e) {
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            
            var sel_files = [];
            $(".images_wraper").html("");

            filesArr.forEach(function(f) {
                /*
                if(!f.type.match("imags.*")) { 
                    alert("확장자는 이미지 확장자만 가능합니다.");
                    return;
                }*/
                sel_files.push(f);

                console.log(sel_files);

                var reader = new FileReader();
                
                reader.onload = function(e) {
                    var img_html = "<img src=\"" + e.target.result + "\" />";
                    $(".images_wraper").append(img_html);
                }
                reader.readAsDataURL(f);

            });
    }

    document.domain = "starcafe.ddns.net";

    function jusoCallBack(roadFullAddr, roadAddrPart1, addrDetail, roadAddrPart2, engAddr, jibunAddr, zipNo, admCd, rnMgtSn, bdMgtSn, detBdNmList, bdNm, bdKdcd, siNm, sggNm, emdNm, liNm, rn, udrtYn, buldMnnm, buldSlno, mtYn, lnbrMnnm, lnbrSlno, emdNo) {
        document.getElementById('roadFullAddr').value = roadFullAddr;
        document.getElementById('roadAddrPart1').value = roadAddrPart1;
        document.getElementById('addrDetail').value = addrDetail;
        document.getElementById('roadAddrPart2').value = roadAddrPart2;
        document.getElementById('engAddr').value = engAddr;
        document.getElementById('jibunAddr').value = jibunAddr;
        document.getElementById('zipNo').value = zipNo;
        document.getElementById('admCd').value = admCd;
        document.getElementById('rnMgtSn').value = rnMgtSn;
        document.getElementById('bdMgtSn').value = bdMgtSn;
        document.getElementById('detBdNmList').value = detBdNmList;
        document.getElementById('bdNm').value = bdNm;
        document.getElementById('bdKdcd').value = bdKdcd;
        document.getElementById('siNm').value = siNm;
        document.getElementById('sggNm').value = sggNm;
        document.getElementById('emdNm').value = emdNm;
        document.getElementById('liNm').value = liNm;
        document.getElementById('rn').value = rn;
        document.getElementById('udrtYn').value = udrtYn;
        document.getElementById('buldMnnm').value = buldMnnm;
        document.getElementById('buldSlno').value = buldSlno;
        document.getElementById('mtYn').value = mtYn;
        document.getElementById('lnbrMnnm').value = lnbrMnnm;
        document.getElementById('lnbrSlno').value = lnbrSlno;
        document.getElementById('emdNo').value = emdNo;
        document.getElementById('coord_admCd').value = admCd;
        document.getElementById('coord_rnMgtSn').value = rnMgtSn;
        document.getElementById('coord_udrtYn').value = udrtYn;
        document.getElementById('coord_buldMnnm').value = buldMnnm;
        document.getElementById('coord_buldSlno').value = buldSlno;
        getAddr();
    }

    function goPopup() {
        var pop = window.open("./cafe_create_address_popup.php", "pop", "scrollbars=yes, resizable=yes");
    }

    function getAddr() {
        $.ajax({
            url: "http://www.juso.go.kr/addrlink/addrCoordApiJsonp.do" //인터넷망
                ,
            type: "post",
            data: $("#form").serialize(),
            dataType: "jsonp",
            crossDomain: true,
            success: function(jsonStr) {
                var errCode = jsonStr.results.common.errorCode;
                var errDesc = jsonStr.results.common.errorMessage;
                if (errCode != "0") {
                    alert(errCode + "=" + errDesc);
                } else {
                    if (jsonStr != null) {
                        $(jsonStr.results.juso).each(function(){
                            $("#itrf2000_x").val(this.entX);
                            $("#itrf2000_y").val(this.entY);
                        });
                        console.log(jsonStr);
                    }
                }
            },
            error: function(xhr, status, error) {
                alert("에러발생");
            }
        });
    }
</script>

</head>
<body>
    <form name="form" id="form" method="post">
        <input type="hidden" name="resultType" value="json" /> <!-- 요청 변수 설정 (검색결과형식 설정, json) -->
        <input type="hidden" name="confmKey" value="devU01TX0FVVEgyMDIwMDQyNjIxNDM1NDEwOTcwNTU=" /><!-- 요청 변수 설정 (승인키) -->
        <input type="hidden" name="admCd" id="coord_admCd" value="" /> <!-- 요청 변수 설정 (행정구역코드) -->
        <input type="hidden" name="rnMgtSn" id="coord_rnMgtSn" value="" /><!-- 요청 변수 설정 (도로명코드) -->
        <input type="hidden" name="udrtYn" id="coord_udrtYn" value="" /> <!-- 요청 변수 설정 (지하여부) -->
        <input type="hidden" name="buldMnnm" id="coord_buldMnnm" value="" /><!-- 요청 변수 설정 (건물본번) -->
        <input type="hidden" name="buldSlno" id="coord_buldSlno" value="" /><!-- 요청 변수 설정 (건물부번) -->
    </form>
    <form method="post" action="./index.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="cafe_list">
        <input type="hidden" name="type" value="cafe_create">
        <input type="hidden" id="roadAddrPart1">
        <input type="hidden" id="addrDetail">
        <input type="hidden" id="roadAddrPart2">
        <input type="hidden" id="engAddr">
        <input type="hidden" id="jibunAddr">
        <input type="hidden" id="zipNo">
        <input type="hidden" id="admCd">
        <input type="hidden" id="rnMgtSn">
        <input type="hidden" id="bdMgtSn">
        <input type="hidden" id="detBdNmList">
        <input type="hidden" id="bdNm">
        <input type="hidden" id="bdKdcd">
        <input type="hidden" name="si" id="siNm"> <!-- cafe.si -->
        <input type="hidden" name="gu" id="sggNm"> <!-- cafe.gu -->
        <input type="hidden" name="dong" id="emdNm"> <!-- cafe.dong -->
        <input type="hidden" name="li" id="liNm"> <!-- cafe.li -->
        <input type="hidden" id="rn">
        <input type="hidden" id="udrtYn">
        <input type="hidden" id="buldMnnm">
        <input type="hidden" id="buldSlno">
        <input type="hidden" id="mtYn">
        <input type="hidden" id="lnbrMnnm">
        <input type="hidden" id="lnbrSlno">
        <input type="hidden" id="emdNo">
        <input type="hidden" name="x_pos" id="itrf2000_x"> <!-- cafe.x_pos -->
        <input type="hidden" name="y_pos" id="itrf2000_y"> <!-- cafe.y_pos -->
        <table>
            <thead>
                <tr>
                    <th colspan="2">카페 추가하기</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tag">카페이름 :</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="tag">카테고리 :</td>
                    <td>
                        <select name="category">
                            <option value="1">인기카페</option>
                            <option value="2">개인카페</option>
                            <option value="3">프렌차이즈카페</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="tag">주소 :</td>
                    <td>
                        <input type="text" name="address" id="roadFullAddr">
                        <input type="button" value="주소검색" onclick="goPopup();">
                    </td>
                </tr>
                <tr>
                    <td class="tag">이미지업로드 :</td>
                    <td>
                        <input type="file" id="cafe_images" name="cafe_images[]" multiple />
                    </td>
                </tr>
                <tr>
                    <td class="images_wraper" colspan="2">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"> <input type="submit" value="카페추가하기"> </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>
</html>