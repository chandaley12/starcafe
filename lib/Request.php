<?php
class Request 
{
    private $params = Array();
    private $title = "";
    
    function __construct($title=null)
    {
        $this->title = $title;
        if( is_array($_REQUEST) )
        {
            foreach($_REQUEST as $name => $value) 
            {
                $this->add($name, $value);
            }
        }
    }
    // setter / getter of params
    function add($name, $data)
    {
        $this->params[$name] = $data;
    }
    function get($name)
    {
        return $this->params[$name] ? $this->params[$name] : null;
    }
    // setter / getter of title
    function setTitle($title)
    {
        $this->title = $title;
    }
    function getTitle()
    {
        return $this->title;
    }
}
?>