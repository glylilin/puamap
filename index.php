<?php
define('THINK_PATH', __DIR__."/BaseCore/");
define("APP_DEBUG", true);
define("APP_NAME", 'puamap');
define("APP_PATH", "./".APP_NAME."/");
define("RUNTIME_PATH",'./Runtime/');
define('ALL_PARAMS_PATH',APP_PATH."Common/Conf/");
define("HTML_PATH",RUNTIME_PATH."/CacheHtml/");
require THINK_PATH.'ThinkPHP.php';