<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $database = "starcafe";
    private $username = "admin";
    private $password = "bc12";
    public $conn = null;

    // get the database connection
    public function getConnection(){

        $this->conn = null;
  
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
/*
$db = new Database();
$_conn = $db->getConnection();
$stmt = $_conn->prepare("SELECT * FROM member WHERE idx='1'");
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$result = array(
    $idx = $row['idx'],
    $email = $row['email'],
    $password = $row['password'],
    $name = $row['name'],
    $favorite = $row['favorite'],
    $gender = $row['gender']
);
print_r($result);

echo("hello");
*/

?>