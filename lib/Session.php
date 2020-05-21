<?php
class Session 
{
    // setter / getter of $_SESSION array
    function add($name, $data)
    {
        $_SESSION[$name] = $data;
    }
    function get($name)
    {
        return $_SESSION[$name];
    }

}

// session start through the php documents
session_start();
?>