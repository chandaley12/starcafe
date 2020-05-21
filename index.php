<?php
    
    require_once("./common.php");
    require_once("./Controller.php");
    require_once(SC_LIB_PATH."/Session.php");
    require_once(SC_LIB_PATH."/Request.php");
    require_once(SC_LIB_PATH."/Result.php");

    $session = new Session();
    $request = new Request();
    $result = new Result();
    $controller = new Controller($session, $request, $result);
    //console("Global Variable initalize done!");
    /*
    php7 is pass by reference by default!!
    want to call by value use "$a = clone $b;"
    */
    
    console("index.php : start of the indexfile");

    console("index.php[action] : ".$request->get("action"));
    console("index.php[type] : ".$request->get("type"));

    $controller->execute();

    console("index.php : end of the indexfile");
?>