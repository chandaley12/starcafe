<?php
include_once('../common.php');
include_once('../lib/Database.php');

console("adm/index.php[action] : ".$_REQUEST['action']);
console("adm/index.php[type] : ".$_REQUEST['type']);

switch($_REQUEST['action'])
{
    case 'cafe_list':
        cafe_list();
    break;
    case 'main':   
    default:
        include_once('./main.php');
    break;
}
function cafe_list()
{
    if($_REQUEST['type'] == 'create')
    {
        include_once('./cafe_create_form.php');
    }
    else if($_REQUEST['type'] == 'cafe_create')
    {
        include_once('./cafe_create.php');
    }
    else 
    {
        include_once('./'.$_REQUEST['action'].'.php');
    }
}


?>