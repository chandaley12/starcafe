<?php
include_once("../lib/Database.php");
$db = new Database();
$conn = $db->getConnection();

/*

$pageNum = $_REQUEST['page'] ? $_REQUEST['page'] : 1;   //현재 탐색중인 페이지
$list = 10; // 한 페이지에 보여줄 리스트 개수
            // default : 현재 페이지는 1 페이지 / 1페이지에 10개 게시물 출력

$b_pageNum_list = 10;       // 게시판 밑에 탐색중인 페이지를 기준 10개 숫자를 정렬
$block = ceil($pageNum / $b_pageNum_list);  //  정렬 리스트의 블럭 단위

$b_start_page = ( ($block - 1) * $b_pageNum_list ) + 1; //현재 블럭에서 시작페이지 번호
$b_end_page = $b_start_page + $b_pageNum_list - 1;      //현재 블럭에서 마지막페이지 번호


//두번째 블럭의 $b_start_page 값.
//$block = 2, $b_pageNum_list = 10 일때
//$b_start_page = ( ( 2 -1 ) * 10 ) + 1 = 11;

//두번째 블럭의 시작 페이지는 11 페이지.



$total_count = NULL;    // db 테이블상 총 컬럼갯수
$total_page = ceil($total_count / $list);   // 총 페이지 갯수

if($b_end_page > $total_page)
{
    $b_end_page = $total_page;
    // 페이지의 끝까지 탐색했을 경우 $b_end_page를 총 페이지 갯수로 셋팅
}

*/
/*
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
      parent::__construct($it, self::LEAVES_ONLY); 
    }
  
    function current() {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }
  
    function beginChildren() { 
      echo "<tr>"; 
    } 
  
    function endChildren() { 
      echo "</tr>" . "\n";
    } 
  } 
*/

$page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
$offset = ($page - 1) * 10;
$query = "SELECT * FROM cafe order by idx limit $offset, 10";
$stmt = $conn->prepare($query);
$stmt->execute();

$count = $stmt->fetchColumn();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width:100%;
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }
        th, td {
            border-bottom: 1px solid #444444;
            text-align:center;
        }
        .key {
            width:6%;
        }
        .category {
            width:6%;
        }
        .address {
            width:30%;
        }
        .createdate {
            width:10%;
        }

    </style>
</head>

<body>
<table>

    <thead>
        <tr>
            <th colspan="5">카페 리스트</th>
        </tr>
        <tr>
            <th class="key">고유키</th>
            <th class="category">카테고리</th>
            <th>카페명</th>
            <th class="address">주소</th>
            <th class="createdate">생성일</th>
        </tr>
    </thead>

    <tbody>
<?php
    if($count > 0)
    {
        while($v = $stmt->Fetch(PDO::FETCH_ASSOC) )
        {
?>
        <tr>
            <td><?php echo($v['idx']); ?></td>
            <td><?php echo($v['category_idx']); ?></td>
            <td><?php echo($v['name']); ?></td>
            <td><?php echo($v['address']); ?></td>
            <td><?php echo($v['create_date']); ?></td>
        </tr>
<?php
        }
    }
?>
    </tbody>
    <tfoot>
        <table>
            <tr>
            <td align="center">
                
            </td>
            </tr>
        </table>
    </tfoot>


</table>
<form method="post" action="./index.php">
        <input type="hidden" name="action" value="cafe_list">
        <input type="hidden" name="type" value="create">
        <input type="submit" value="추가하기">
</form>

</body>

</html>