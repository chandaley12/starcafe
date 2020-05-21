<?php
include_once('../common.php');
include_once('../lib/Database.php');

console("cafe_create.php : start");
$db = new Database();
$conn = $db->getConnection();

/*
    `idx`, 
    `category_idx`, 
    `name`, 
    `address`, 
    `si`, 
    `gu`, 
    `dong`, 
    `li`, 
    `x_pos`, 
    `y_pos`, 
    `menu_cnt`, 
    `review_cnt`, 
    `views`, 
    `file_cnt`, 
    `menu_hot`, 
    `menu_now`, 
    `update_date`, 
    `create_date`
*/

echo("카페이름 : ".$_REQUEST['name']);echo("<br>");
echo("카페주소 : ".$_REQUEST['address']);echo("<br>");
echo("카페카테고리 : ".$_REQUEST['category']);echo("<br>");
echo("카페시 : ".$_REQUEST['si']);echo("<br>");
echo("카페구 : ".$_REQUEST['gu']);echo("<br>");
echo("카페동 : ".$_REQUEST['dong']);echo("<br>");
echo("카페리 : ".$_REQUEST['li']);echo("<br>");
echo("카페x : ".$_REQUEST['x_pos']);echo("<br>");
echo("카페y : ".$_REQUEST['y_pos']);echo("<br>");

echo("파일 :");print_r($_FILES);echo("<br>");

foreach($_FILES['cafe_images']['name'] as $f => $name)
{
    $cnt++;
}
echo("파일 갯수 : ".$cnt);


$create_date = date('Y-m-d H:i:s', time());

$query = "
    INSERT INTO cafe
        set category_idx = {$_REQUEST['category']},
            name = '{$_REQUEST['name']}',
            address = '{$_REQUEST['address']}',
            si = '{$_REQUEST['si']}',
            gu = '{$_REQUEST['gu']}',
            dong = '{$_REQUEST['dong']}',
            li = '{$_REQUEST['li']}',
            x_pos = {$_REQUEST['x_pos']},
            y_pos = {$_REQUEST['y_pos']},
            menu_cnt = 'NULL',
            review_cnt = 'NULL',
            views = 'NULL',
            file_cnt = $cnt,
            menu_hot = 'NULL',
            menu_now = 'NULL',
            update_date = 'NULL',
            create_date = '{$create_date}'
";
$stmt = $conn->prepare($query);

if($stmt->execute())
{
    console("cafe_create.php : insert success");
}
else
{
    console("cafe_create.php : insert faild");
}

$cafe_idx = null;

echo("<br>");
echo("<br>");
$query = "";
$query = "SELECT * FROM cafe WHERE name = '{$_REQUEST['name']}' AND address = '{$_REQUEST['address']}' ";
echo("<br>query : ");print_r($query);
$stmt = $conn->prepare($query);

if($stmt->execute())
{
    console("cafe_create.php : select success");
}
else
{
    console("cafe_create.php : select failed");
}
if($stmt->rowCount() > 0)
{
    console("cafe_create.php : rowCount");
    $row = $stmt->Fetch(PDO::FETCH_ASSOC);
    $cafe_idx = $row['idx'];
    echo("<br>");
    echo("row : ");print_r($row);
}


// file logic
$uploadBase_dir = '/data/cafe/'.$cafe_idx."/";
$uploadBase = '..'.$uploadBase_dir;
$uploadDir = '/home/admin/html'.$uploadBase_dir;

if(@mkdir($uploadBase, 0777))
{
    if(is_dir($uploadBase))
    {
        @chmod($uploadBase, 0777);
        console("cafe_create.php : dir created");
    }
}
else
{
    console("cafe_create.php : dir not created");
}

$create_date = date('Y-m-d H:i:s', time());
/*
$query = "
    INSERT INTO cafe_file
        set cafe_idx = $cafe_idx,
            order = ?,
            path = '{$uploadBase}',
            source = ?,
            name = ?,
            type = ?,
            filesize = ?,
            create_date = '{$create_date}'
";
*/
$query = "INSERT INTO `cafe_file` (`idx`, `cafe_idx`, `order`, `path`, `source`, `name`, `type`, `filesize`, `create_date`) 
                                VALUES (NULL, '{$cafe_idx}', ?, '{$uploadDir}', ?, ?, ?, ?, '{$create_date}')";
$stmt = $conn->prepare($query);

/*
$stmt->bindParam(':order', $f);
$stmt->bindParam(':source', $name);
$stmt->bindParam(':name', $uploadname);
$stmt->bindParam(':type', $fileType);
$stmt->bindParam(':size', $fileSize);
*/
try 
{
    $conn->beginTransaction();
    foreach($_FILES['cafe_images']['name'] as $f => $name)             // f -> cafe_file.order
    {
        $name = $_FILES['cafe_images']['name'][$f];                    //cafe_file.original name(source)
        $uploadname_splitByDot = explode('.', $name);

        $fileSize = $_FILES['cafe_images']['size'][$f];
        $fileType = $_FILES['cafe_images']['type'][$f];
        $uploadname = time().$f.'.'.$uploadname_splitByDot[1];         //cafe_file.file name(name)
        $uploadFile = $uploadBase.$uploadname;
        echo("<br><br>".$uploadFile);

        if(move_uploaded_file($_FILES['cafe_images']['tmp_name'][$f], $uploadFile))
        {
            echo("<br><br>");print_r($stmt);
            print_r(array($f, $name, $uploadname, $fileType, $fileSize));echo("<br>");
            if($stmt->execute(array($f, $name, $uploadname, $fileType, $fileSize)))
            {
                console("cafe_create.php : file - success");
            }
            else
            {
                console("cafe_create.php : file - execute failed");
            }
        }
        else
        {
            console("cafe_create.php : file - file failed");
        }
    }
    $conn->commit();

}
catch(PDOException $e)
{
    $conn->rollBack();
    echo $e->getMessage();
    throw $e;
}




console("cafe_create.php : end");
?>