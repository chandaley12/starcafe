<?php
include_once("../lib/Database.php");
$db = new Database();
$conn = $db->getConnection();

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