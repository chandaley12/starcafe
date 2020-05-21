<?php
include_once(SC_PATH.'/common.php');
include_once(SC_LIB_PATH.'/Database.php');

class Member
{
    private $conn = null;

    private $idx;
    private $id;
    private $pw;
    private $email;
    private $name;
    private $nickname;
    private $birth;
    private $gender;
    private $favorite;
    private $mobile_phone;
    private $profile_img;
    private $event_agree;
    private $location_agree;
    private $update_date;
    private $create_date;
/* 
    ,idx
    ,id
    ,pw
    ,email
    ,name
    ,nickname
    ,birth
    ,gender
    ,favorite
    ,mobile_phone
    ,profile_img
    ,event_agree
    ,location_agree
    ,update_date
    ,create_date
*/
    use AccessField;

    function __construct($_conn)
    {
        $this->conn = $_conn;
        //console("Member.php<construct> : DONE");
    }
    function __destruct()
    {
        $this->conn = null;
        //console("Member.php<destruct> : DONE");
    }
    function getMember()
    {
        $_member = array(
            "idx" => $this->idx,
            "id" => $this->id,
            "pw" => $this->pw,
            "email" => $this->email,
            "name" => $this->name,
            "nickname" => $this->nickname,
            "birth" => $this->birth,
            "gender" => $this->gender,
            "favorite" => $this->favorite,
            "mobile_phone" => $this->mobile_phone,
            "profile_img" => $this->profile_img,
            "event_agree" => $this->event_agree,
            "location_agree" => $this->location_agree,
            "update_date" => $this->update_date,
            "create_date" => $this->create_date
        );
        return $_member;
    }
    function _findByIdx()
    {
        global $_TABLE;
        $query = "SELECT * FROM ".$_TABLE['member_table']." WHERE idx = :idx";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idx", $this->idx);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $row = $stmt->Fetch(PDO::FETCH_ASSOC);
            $this->idx = $row['idx'];
            $this->id = $row['id'];
            $this->pw = $row['pw'];
            $this->email = $row['email'];
            $this->name = $row['name'];
            $this->nickname = $row['nickname'];
            $this->birth = $row['birth'];
            $this->gender = $row['gender'];
            $this->favorite = $row['favorite'];
            $this->mobile_phone = $row['mobile_phone'];
            $this->profile_img = $row['profile_img'];
            $this->event_agree = $row['event_agree'];
            $this->location_agree = $row['location_agree'];
            $this->update_date = $row['update_date'];
            $this->create_date = $row['create_date'];
            return $this->getMember();
        }
        else
        {
            return false;
        }
    }
    function _signIn()
    {
        global $_TABLE;
        console("Member.php<_signin> : start method");
        $query = "SELECT * FROM ".$_TABLE['member_table']." WHERE id = :id and pw = :pw";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":pw", $this->pw);
        $stmt->execute();

        //sql 질의 결과가 하나라도 있다면 rowCount > 0
        if($stmt->rowCount() > 0)
        {
            $row = $stmt->Fetch(PDO::FETCH_ASSOC);
            $this->idx = $row['idx'];
            $this->id = $row['id'];
            $this->pw = $row['pw'];
            $this->email = $row['email'];
            $this->name = $row['name'];
            $this->nickname = $row['nickname'];
            $this->birth = $row['birth'];
            $this->gender = $row['gender'];
            $this->favorite = $row['favorite'];
            $this->mobile_phone = $row['mobile_phone'];
            $this->profile_img = $row['profile_img'];
            $this->event_agree = $row['event_agree'];
            $this->location_agree = $row['location_agree'];
            $this->update_date = $row['update_date'];
            $this->create_date = $row['create_date'];
            console("Member.php<_signin> : start method");
            return $this->getMember();
        }
        else
        {
            console("Member.php<_signin> : start method false");
            return false;
        }
    }

    function _create() 
    {
        global $_TABLE;
        console("Member.php<_create> : start method");
        /*
        //임시 회원가입 중복처리 방지
        $query = "SELECT * FROM ".$_TABLE['member_table']." WHERE id = '{$this->id}'";
        if($this->conn->exec($query))
        {
            return false;
        }
        */
        $query = "
            INSERT INTO {$_TABLE['member_table']}
                set id = '{$this->id}',
                    pw = '{$this->pw}',
                    email = '{$this->email}',
                    name = '{$this->name}',
                    birth = '{$this->birth}',
                    gender = '{$this->gender}',
                    mobile_phone = '{$this->mobile_phone}',
                    event_agree = $this->event_agree,
                    location_agree = $this->location_agree,
                    create_date = '{$this->create_date}'
        ";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
        {
            console("Member.php<_create> : start method");
            return $this->_signIn();
        }
        else
        {
            console("Member.php<_create> : start method false");
            return false;
        }
        /*
        인서트 문
        INSERT INTO `member` 
        (`idx`, `id`, `pw`, `email`, `name`, `nickname`, `birth`, `gender`, `favorite`, `mobile_phone`, `profile_img`, 
        `event_agree`, `location_agree`, `update_date`, `create_date`) 

        VALUES (NULL, 'TEST12', 'test12', 'test@test.com', 'test_name', 'test_nick', '941206', 'm', '\"1,2,3,4,5\"', '01026050292', NULL, 
        '1', '1', NULL, '2020-04-23 22:50:10');

        */
    }
}

/*
$db = new Database();
$_member = new Member($db->getConnection());

$_member->set('email', "test@test.com");
$_member->set('password', "test12");
$mem = $_member->_signIn();

print_r($mem);
*/
?>