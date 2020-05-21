<?php
include_once("./lib/Database.php");
$db = new Database();
$conn = $db->getConnection();

$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
$offset = ($page - 1) * 10;
$query = "SELECT * FROM cafe WHERE category_idx = 2 order by idx limit $offset, 10";
$stmt = $conn->prepare($query);
$stmt->execute();

$count = $stmt->fetchColumn();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <style>
        
        body {
            padding : 0;
            margin : 0;
            margin-right : 2px;
        }
        header {
            width: 100%;
            height : 49px;
            border : 1px solid black;
        }
        header > div {
            width : 100px;
            height : 100%;
            border : 1px solid gray;
            text-align:center;
            float :left;
        }
        header > div.back {
            width : 49px;
        }
        header > div.title {
            width : 305px;
        }
        header > div.sort {
            width : 49px;
        }
        section.list {
            width : 100%;
            border : 1px solid green;
        }
        section.list > article {
            margin : 30px;
            width : 350px;
            height: 300px;
            border : 1px solid greenyellow;
        }
        footer {
            width : 100%;
            height : 64px;
            border : 1px solid purple;
        }

    </style>
</head>
<body>
    <!-- ctrl + f, ctrl + c 로 주석처리하기 -->
    <!-- header : 회원 아이콘, 페이지명, 서치바 -->
    <header>
        <div class="back"><a href="./index.php?action=main">뒤로가기</a></div>
        <div class="title">인기카페</div>
        <div class="sort">sort</div>
    </header>

    <!-- section : 갤러리 내용 -->
    <section class="list">
<?php
    if($count > 0)
    {
        while($v = $stmt->Fetch(PDO::FETCH_ASSOC) )
        {
?>
        <article>
            <div><?php echo($v['idx']); ?></div>
            <div><?php echo($v['category_idx']); ?></div>
            <div><?php echo($v['name']); ?></div>
            <div><?php echo($v['address']); ?></div>
            <div><?php echo($v['create_date']); ?></div>
        </article>
<?php
        }
    }
?>
    </section>
    
    <!-- footer : 아직 뭘 넣어야할지 모르겠음 -->
    <footer>
        footer
    </footer> 
</body>
</html>