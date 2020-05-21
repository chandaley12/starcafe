<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            padding : 0;
            margin : 0;
            margin-right : 2px;
        }
        header {
            text-align: center;
            font-style: bold;
            font-size:30px;
        }
        article {
            width : 200px;
            margin:0 auto;
            margin-top : 50px;
            border : 1px solid black;
            text-align:center;
        }
        article:hover {
            background-color: gray;
            transition: background-color .5s;
        }
    </style>

</head>

<body>

<header>
    관리 페이지
</header>

<section>

<article>
    취향 데이터 추가
</article>

<article onClick="location.href='./index.php?action=cafe_list'">
    카페추가
</article>

</section>



</body>

</html>