<?php

// ########################### DEBUGING FUNCTION ###########################
function console($data)
{
    echo("<script>console.log( 'PHP_Console: " . $data . "' );</script>");
}
trait AccessField {
    public function set($var_name, $data)
    {
        $this->{$var_name} = $data;
    }
    public function get($var_name)
    {
        return $this->{$var_name};
    }
}


// ########################### PATH CONFIGURING FUNCTION ###########################
function starcafe_path()
{
    $chroot = substr($_SERVER['SCRIPT_FILENAME'], 0, strpos($_SERVER['SCRIPT_FILENAME'], dirname(__FILE__))); 
        //echo($chroot."<br>");   // ""
    $result['path'] = str_replace('\\', '/', $chroot.dirname(__FILE__));
        //echo($result['path']."<br>");   // "/home/admin/html"
    $server_script_name = preg_replace('/\/+/', '/', str_replace('\\', '/', $_SERVER['SCRIPT_NAME'])); 
        //echo($server_script_name."<br>");   // "/index.php"
    $server_script_filename = preg_replace('/\/+/', '/', str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME'])); 
        //echo($server_script_filename."<br>");   // "/home/admin/html/index.php"
    $tilde_remove = preg_replace('/^\/\~[^\/]+(.*)$/', '$1', $server_script_name); 
        //echo($tilde_remove."<br>");     // "/index.php"
    $document_root = str_replace($tilde_remove, '', $server_script_filename);
        //echo($document_root."<br>");    // "/home/admin/html"
    $pattern = '/.*?' . preg_quote($document_root, '/') . '/i';
        //echo($pattern."<br>");  // "/.*?\/home\/admin\/html/i"
    $root = preg_replace($pattern, '', $result['path']);
        //echo($root."<br>"); // ""
    $port = ($_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 443) ? '' : ':'.$_SERVER['SERVER_PORT']; 
        //echo($port."<br>"); // ""
    $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://'; 
        //echo($http."<br>"); // "http://"
    $user = str_replace(preg_replace($pattern, '', $server_script_filename), '', $server_script_name); 
        //echo($user."<br>"); // ""
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']; 
        //echo($host."<br>"); // "starcafe.ddns.net"
    if(isset($_SERVER['HTTP_HOST']) && preg_match('/:[0-9]+$/', $host)) 
        $host = preg_replace('/:[0-9]+$/', '', $host); 
    $host = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*]/", '', $host); 
        //echo($host."<br>"); // "starcafe.ddns.net"
    $result['url'] = $http.$host.$port.$user.$root; 
        //echo($result['url']."<br>");    // "http://starcafe.ddns.net"
    return $result;
}

// ########################### PATH CONFIGUREATION ###########################
$_PATH = starcafe_path();

define('SC_DOMAIN', '');
define('SC_HTTPS_DOMAIN', '');

if (SC_DOMAIN) {
    define('SC_URL', SC_DOMAIN);
} else {
    if (isset($_PATH['url']))
        define('SC_URL', $_PATH['url']);
    else
        define('SC_URL', '');
}
    //echo(SC_URL); // "http://starcafe.ddns.net"
if (isset($_PATH['path'])) {
    define('SC_PATH', $_PATH['path']);
} else {
    define('SC_PATH', '');
}
    //echo(SC_PATH);    // "/home/admin/html"

// ========= DIR DECLARATION =========
define('SC_LIB_DIR', 'lib');
define('SC_MODEL_DIR', 'model');
define('SC_VIEW_DIR', 'view');
define('SC_THEME_DIR', 'theme');

// ========= URL DECLARATION =========
define('SC_LIB_URL', SC_URL.'/'.SC_LIB_DIR);
define('SC_MODEL_URL', SC_URL.'/'.SC_MODEL_DIR);
define('SC_VIEW_URL', SC_URL.'/'.SC_VIEW_DIR);
define('SC_THEME_URL', SC_URL.'/'.SC_THEME_DIR);
define('SC_JS_URL', SC_URL.'/assets/js');

// ========= PATH DECLARATION =========
define('SC_LIB_PATH', SC_PATH.'/'.SC_LIB_DIR);
define('SC_MODEL_PATH', SC_PATH.'/'.SC_MODEL_DIR);
define('SC_VIEW_PATH', SC_PATH.'/'.SC_VIEW_DIR);
define('SC_THEME_PATH', SC_PATH.'/'.SC_THEME_DIR);
define('SC_JS_PATH', SC_PATH.'/assets/js');


// ========= GENERAL PERMISSION DECLARATION =========
define('DIR_PERMISSION',  0755); // 디렉토리 생성시 퍼미션
define('FILE_PERMISSION', 0644); // 파일 생성시 퍼미션


// ########################### TABLE NAME CONFIGUREATION ###########################
$_TABLE = array(
    'category_table' => 'category',
    'location_table' => 'location',
    'favorite_table' => 'favorite',
    'member_table' => 'member'
);

// ########################### PAGE NAME CONFIGUREATION ###########################

$_PAGE = array(
    //'top' => SC_VIEW_PATH.'/top/index.php',
    'invalid_access' => SC_VIEW_PATH.'/error/invalidAccess.php',
    'invalid_signin' => SC_VIEW_PATH.'/error/invalidSignIn.php',
    'top' => SC_VIEW_PATH.'/member/signIn.php',
    'signup' => SC_VIEW_PATH.'/member/signUp.php',
    'signupfavor' => SC_VIEW_PATH.'/member/signUpFavor.php',
    'main' => SC_VIEW_PATH.'/main/main.php',
    'cafe_main' => SC_PATH.'/cafe.php'
    /*,
    'findID' => '',
    'findPW' => '',
    'signUp' => '',
    'signUpInfo' => '',
    'signUpFavor' => ''*/
);


?>