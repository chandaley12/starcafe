<?php
include_once("../../common.php");
include_once(SC_LIB_PATH.'/Database.php');

$q = $_GET['q'];

$db = new Database();
$_conn = $db->getConnection();

$query = "SELECT * FROM member WHERE id = :id";
$stmt = $_conn->prepare($query);
$stmt->bindParam(":id", $q);
$stmt->execute();

if(strlen($q) < 5) 
{
    echo("아이디는 5자 이상입니다.");
}
else if(strlen($q) > 20)
{
    echo("아이디는 20자 이내입니다.");
}
else if(str_word_count($q) != 1) 
{
    echo("띄어쓰기와 한글은 사용할 수 없습니다.");
}
else if($stmt->rowCount() > 0)
{
    echo("이미 존재하는 사용자 이름입니다!");
}
else 
{
    echo("사용하실 수 있습니다!");
}
