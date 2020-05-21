<?php

if($_SESSION['name'])
{
}
else
{
    // 세션정보(로그인정보)가 없을 경우 페이지를 index.php로 이동시키고
    // die(); 를 통해 나머지 페이지 처리 안되고 빠져나옴.
    header('Location: ./index.php?action=top');
    die();
}

switch($this->request->get('category'))
{
    case 'hot':
        include_once(SC_VIEW_PATH.'/cafe/cafeHot.php');
    break;
    default:
        include_once(SC_VIEW_PATH.'/cafe/cafeMain.php');
    break;
}

?>