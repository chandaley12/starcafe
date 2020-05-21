<?php
class Result
{
    private $result = Array();

    // setter / getter of result
    function add($name, $data)
    {
        $this->result[$name] = $data;
    }
    function get($name)
    {
        return $this->result[$name];
    }
}
?>