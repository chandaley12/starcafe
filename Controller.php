<?php
include_once("common.php");

class Controller
{
    private $session = null;
    private $request = null;
    private $result = null;
    private $canvasPage = "";

    function __construct($session, $request, $result)
    {
        $this->session = $session;
        $this->request = $request;
        $this->result = $result;
    }

    function execute()
    {
        //console("Controller : execute method");
        //print_r($this->request);
        switch( $this->request->get("action") )
        {
            case "signin":
                $this->signin();
            break;
            case "signup":
                $this->signup();
            break;
            case "main":
                $this->main();
            break;

            case "top":
            default:
                $this->topPage();
            break;
        }
        $this->displayPage();
    }

    function signin()
    {
        global $_PAGE;

        include_once(SC_MODEL_PATH.'/member/MemberLogic.php');
        $logic = new MemberLogic($this->request, $this->result);
        $logic->signIn();
        if($this->result->get('result'))
        {
            console("Controller.php<signin> : find the user!");
            $this->canvasPage = $_PAGE['main'];
            $this->request->setTitle('main!!');
            $this->session->add('name', $this->result->get('member')['name']);
        }
        else 
        {
            /*
            아이디 / 비밀번호 찾기 로직 - 세현, 나
            ex)
            include_once(SC_MODEL_PATH.'/member/MemberLogic.php');
            $logic = new MemberLogic($this->request, $this->result);

            */
            console("Controller.php<signin> : cant find the user!");
            $this->canvasPage = $_PAGE['invalid_signin'];
            $this->request->setTitle("invalid signin!!");
        }
    }
    function signup()
    {
        global $_PAGE;

        if($this->request->get('type') == 'form')
        {
            $this->canvasPage = $_PAGE['signup'];
            $this->request->setTitle('signup!!');
        }
        else if($this->request->get('type') == 'favorite_choice')
        {

            $this->canvasPage = $_PAGE['signupfavor'];
            $this->request->setTitle('signupfavor');
            /*
            취향데이터 로직 - 혜원
            ex)
            include_once(SC_MODEL_PATH.'/member/MemberLogic.php');
            $logic = new MemberLogic($this->request, $this->result);

            $logic->choseFavorite();
            $

            */
        }
        else if($this->request->get('type') == 'confirm')
        {
            include_once(SC_MODEL_PATH.'/member/MemberLogic.php');
            $logic = new MemberLogic($this->request, $this->result);
            $logic->create();
            

            if($this->result->get('result'))
            {
                //회원가입 성공
                console("회원가입 성공!");
            }
            else 
            {
                //회원가입 실패
                console("회원가입 대실패!!");
            }
            $this->canvasPage = $_PAGE['main'];
            $this->request->setTitle('main!!');
        }
        
        
    }
    function main()
    {
        global $_PAGE;

        $this->canvasPage = $_PAGE['cafe_main'];
        $this->request->setTitle('starcafe');
    }

    function topPage()
    {
        global $_PAGE;

        $this->canvasPage = $_PAGE['top'];
        $this->request->setTitle("topPage");
    }

    function displayPage()
    {
        if( isset($this->canvasPage) )
        {
            include_once("{$this->canvasPage}");
            console("Controller.php<displayPage> : ".$this->canvasPage);
        }
        else
        {
            $this->invalidAccess();
        }
    }

    function invalidAccess()
    {
        global $_PAGE;

        $this->canvasPage = $_PAGE['invalid_access'];
        $this->request->setTitle("invalid access!!");
    }

}



?>