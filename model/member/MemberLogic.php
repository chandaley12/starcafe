<?php
include_once(SC_PATH.'/common.php');
include_once(SC_LIB_PATH.'/Database.php');
include_once(SC_MODEL_PATH.'/member/Member.php');
//include_once(SC_MODEL_PATH.'/member/MemberDAO.php');
//include_once(SC_PATH.'/Request.php');
//include_once(SC_PATH.'/Result.php');

class MemberLogic
{
    var $request;
    var $result;

    function __construct($request, $result)
    {
        $this->request = $request;
        $this->result = $result;
        //console("MemberLogic.php<construct> : DONE");
    }
    function __destruct()
    {
        //console("MemberLogic.php<destruct> : DONE");
    }
    function findByIdx()
    {
        $db = new Database();
        $_member = new Member($db->getConnection());
        $_member->set('idx', $this->request->get('idx'));

        $_result = $_member->_findByIdx();
        if($_result != false)
        {
            $this->result->add('result', true);
            $this->result->add('member', $_result);
        }
    }
    function signIn()
    {
        $db = new Database();
        $_member = new Member($db->getConnection());
        $_member->set('id', $this->request->get('id'));
        $_member->set('pw', $this->request->get('pw'));
        $_result = $_member->_signIn();

        if($_result != false)
        {
            $this->result->add('result', true);
            $this->result->add('member', $_result);
        }
    }
    function create()
    {
        console("MemberLogic.php<create> : start method");
        $db = new Database();
        $_member = new Member($db->getConnection());

        $_member->set('id', $this->request->get('id'));
        $_member->set('pw', $this->request->get('pw'));
        $_member->set('email', $this->request->get('email'));
        $_member->set('name', $this->request->get('name'));
        $_member->set('birth', $this->request->get('birth'));
        $_member->set('gender', $this->request->get('gender'));
        $_member->set('mobile_phone', str_replace('-','',$this->request->get('mobile_phone')));

        $_event_agree = $this->request->get('event_agree');
        if($this->request->get('event_agree') != 1)
        {
            $_event_agree = 0;
        }
        $_member->set('event_agree', $_event_agree);

        $_location_agree = $this->request->get('location_agree');
        if($this->request->get('location_agree') != 1)
        {
            $_location_agree = 0;
        }
        $_member->set('location_agree', $_location_agree);
        $_member->set('create_date', date('Y-m-d H:i:s', time()) );
        $_result = $_member->_create();

        if($_result != false)
        {
            $this->result->add('result', true);
            $this->result->add('member', $_result);
        }
        console("MemberLogic.php<create> : end method");
    }

}
/*
include_once(SC_LIB_PATH.'/Request.php');
include_once(SC_LIB_PATH.'/Result.php');
$req = new Request();
$res = new Result();

$req->add('email', "test@test.com");
$req->add('password', "test12");

$meml = new MemberLogic($req, $res);
$meml->signIn();

print_r($meml->result);
echo($meml->result->get('result'));
echo($meml->result->get('member')['idx']);

*/
?>