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
        header > div.member {
            width : 49px;
        }
        header > div.title {
            width : 305px;
        }
        header > div.searchbar {
            width : 49px;
        }
        nav {
            width :100%;
            height : 44px;
            border : 1px solid red;
        }
        nav > div {
            width : 100px;
            height : 100%;
            border : 1px solid pink;
            text-align:center;
            float:left;
        }
        aside {
            /* 갤럭시 S10 5g 가로 412 세로 725 */
            /* 
                배너사이즈 (임시) 3:2 비율
                3:2 = 412:x
                x = 274
            
            */
            width:100%;
            height :274px;
            border : 1px solid blue;
        }
        section.gallery {
            /*
                갤러리 페이지 (임시)의 세로는 배너사이즈 세로의 3:2
                3:2 = 274:x
                x = 182
            */
            width : 100%;
            height : 182px;
            border : 1px solid green;
        }
        section.gallery > article {
            margin : 16px;
            height: 150px;
            width : 150px;
            border : 1px solid greenyellow;
            float : left;
        }
        section.hashtag {
            width : 100%;
            height : 100px;
            border : 1px solid yellow;
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
        <div class="member"><?php echo($_SESSION['name']); ?></div>
        <div class="title">스타카페</div>
        <div class="searchbar">서치바</div>
    </header>

    <!-- nav : 카테고리 1~4 네비게이션 -->
    <nav>
        <div><a href="./index.php?action=main&category=hot">인기카페</a></div>
        <div>개인카페</div>
        <div>프렌차이즈</div>
        <div>내주변카페</div>
    </nav>


    <!-- aside : 배너광고 -->
    <aside>
        aside
    </aside>

    <!-- section : 갤러리 내용 -->
    <section class="gallery">
        <article>
            article1
        </article>
        <article>
            article2
        </article>
    </section>

    <section class="hashtag">
            a
    </section>
    
    <!-- footer : 아직 뭘 넣어야할지 모르겠음 -->
    <footer>
        footer
    </footer>
</body>
</html>