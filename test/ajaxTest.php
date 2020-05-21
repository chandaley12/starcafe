<?php
include_once("../common.php");
include_once(SC_LIB_PATH.'/Database.php');

$q = $_GET['q'];

$db = new Database();
$_conn = $db->getConnection();

$query = "SELECT * FROM member WHERE id = :id";
$stmt = $_conn->prepare($query);
$stmt->bindParam(":id", $q);
$stmt->execute();

if($stmt->rowCount() > 0)
{
    echo("이미 존재하는 사용자 이름입니다!");
}
else 
{
    echo("사용하실 수 있습니다!");
}
