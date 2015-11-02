<?php

require 'Load.php';

//load required directory


Load::directory("lib/tools");



class Bone
{
    public static $response = [];
    private static $_config = [];
    private static $_functions = [];

        //@{ HTTP status codes (RFC 2616)
    const
        HTTP_100='Continue',
        HTTP_101='Switching Protocols',
        HTTP_200='OK',
        HTTP_201='Created',
        HTTP_202='Accepted',
        HTTP_203='Non-Authorative Information',
        HTTP_204='No Content',
        HTTP_205='Reset Content',
        HTTP_206='Partial Content',
        HTTP_300='Multiple Choices',
        HTTP_301='Moved Permanently',
        HTTP_302='Found',
        HTTP_303='See Other',
        HTTP_304='Not Modified',
        HTTP_305='Use Proxy',
        HTTP_307='Temporary Redirect',
        HTTP_400='Bad Request',
        HTTP_401='Unauthorized',
        HTTP_402='Payment Required',
        HTTP_403='Forbidden',
        HTTP_404='Not Found',
        HTTP_405='Method Not Allowed',
        HTTP_406='Not Acceptable',
        HTTP_407='Proxy Authentication Required',
        HTTP_408='Request Timeout',
        HTTP_409='Conflict',
        HTTP_410='Gone',
        HTTP_411='Length Required',
        HTTP_412='Precondition Failed',
        HTTP_413='Request Entity Too Large',
        HTTP_414='Request-URI Too Long',
        HTTP_415='Unsupported Media Type',
        HTTP_416='Requested Range Not Satisfiable',
        HTTP_417='Expectation Failed',
        HTTP_500='Internal Server Error',
        HTTP_501='Not Implemented',
        HTTP_502='Bad Gateway',
        HTTP_503='Service Unavailable',
        HTTP_504='Gateway Timeout',
        HTTP_505='HTTP Version Not Supported';
    //@}

        const
        E_Pattern='Invalid routing pattern: %s',
        E_Named='Named route does not exist: %s',
        E_Fatal='Fatal error: %s',
        E_Open='Unable to open %s',
        E_Routes='No routes specified',
        E_Class='Invalid class %s',
        E_Method='Invalid method %s',
        E_Hive='Invalid hive key %s';


    // Provide routes
    public static function get($pattern, $callback)
    {
        self::$_functions['GET'][$pattern] = $callback;
    }
    public static function post($pattern, $callback)
    {
        self::$_functions['POST'][$pattern] = $callback;
    }
    public static function put($pattern, $callback)
    {
        self::$_functions['PUT'][$pattern] = $callback;
    }
    public static function delete($pattern, $callback)
    {
        self::$_functions['DELETE'][$pattern] = $callback;
    }

    /**
    *   Send HTTP status header; Return text equivalent of status code
    **/
    function status($code) {
        $reason=@constant('self::HTTP_'.$code);
        if (PHP_SAPI!='cli')
            header($_SERVER['SERVER_PROTOCOL'].' '.$code.' '.$reason);
        return $reason;
    }

    //initialize here all needed config
    public function initializeConfiguration(){
            //initial Configured autoload
        if(count($GLOBALS['config']['autoload']))
            self::autoload($GLOBALS['config']['autoload']);


    }

    public function config(array $config){
            
             $GLOBALS['config'] = $config;
            self::initializeConfiguration();

                        // Init URI
            if (isset($_GET['_q'])) {
                $GLOBALS['config']['_uri'] = $pattern = '/' . trim($_GET['_q'], '/').'/';
            } else {
                $GLOBALS['config']['_uri'] = '/';
            }
            // Init request method
            if (isset($_SERVER['REQUEST_METHOD'])) {
                $GLOBALS['config']['_method'] = $_SERVER['REQUEST_METHOD'];
            } else {
                $GLOBALS['config']['_method'] = 'GET';
            }
             $GLOBALS['config']['body'] = file_get_contents('php://input');
 
    }
    public static function run()
    {
            $_findAction = false;

            //Get all route assigned on HTTP Method of current request. eg. GET, POST
            $functions = self::$_functions[$GLOBALS['config']['_method']];

            //check if route is assign to  HTTP Method of current request
            if ( !isset($functions)) {
               self::error(400,['Invalid request method']);
            }

            foreach($functions as $pattern => $callback) {
                // Give expression from pattern
                //replace {} with (?.+)
                $pattern = preg_replace('/{([\w]+)}/i', '(?<$1>.+)', $pattern);
                //Remove spaces;
                $pattern = '/' . trim($pattern, '/').'/';
                // add this to create pattern that will get parameters
                $pattern = '%^' . $pattern . '$%u';

                // Run function or action
                if (preg_match($pattern, $GLOBALS['config']['_uri'], $params)) {

                    // before Action
                    ob_start();
                    //call function assigned to route
                    self::call($callback, $params);
                    //indicate success on finding route
                    $body=ob_get_clean();

                    $_findAction = true;
                    break;
                }
            }

            // Init response
            if ($_findAction) {
                echo $body;
            } else {
               self::error(404,['Invalid URI']);
            }

    }
    // Private constructor
    private function __construct(){
        }


    //autoload 
    function autoload(array $path){
        foreach ($path as $key) {
            Load::directory($key);
        }
    }
    function trimParameters($params){
        foreach ($params as $key => $value) {
            if(!is_string($key)) unset($params[$key]);
        }
        return $params;

    }

    public function route(array $file){
        foreach ($file as $route => $methods) {
            foreach ($methods as $method => $value) {
            call_user_func_array(['self', $value['method']],[$route,$value['function']]);
            }
        }
    }

//call function assigned
function call($callback, $params){

        $params=self::trimParameters($params);
        if(is_string($callback)){

            $fn = self::grab($callback);

            if(method_exists($fn[0], 'beforeroute')){
                call_user_func_array(array($fn[0],'beforeroute'),array());
            }

                call_user_func_array($fn,$params);

            if(method_exists($fn[0], 'afterroute')){
                call_user_func_array(array($fn[0],'afterroute'),array());
            }
        }else{

                call_user_func_array($callback,$params);

        }
}

//separate class to functions and arguments
function grab($func,$args=NULL) {
        if (preg_match('/(.+)\h*(->|::)\h*(.+)/s',$func,$parts)) {
            // Convert string to executable PHP callback
            if (!class_exists($parts[1])){
                self::error(500,['Invalid Class', $parts[1].' class does not exist']);
            }
            if ($parts[2]=='->') {
                    $ref=new ReflectionClass($parts[1]);
                    $parts[1]=method_exists($parts[1],'__construct')?
                        $ref->newinstanceargs($args):
                        $ref->newinstance();
                
            }

            $func=array($parts[1],$parts[3]);
        }
        return $func;
    }


    function error($code,$body) {
        
        $header=self::status($code);

        $eol="\n";

        $display = "";

        

          if(is_array($body)){
                foreach ($body as $val) {
                    $display=$display.'<p>'.$val.'</p>'.$eol;
                }

                echo '<!DOCTYPE html>'.$eol.
                '<html>'.$eol.
                '<head>'.
                    '<title>'.$code.' '.$header.'</title>'.
                '</head>'.$eol.
                '<body>'.$eol.
                    '<h1>ERROR '.$code." : ".$header.'<h1><h2> Request : '.$GLOBALS['config']['_method'].' '.
                        $GLOBALS['config']['_uri'].'</h2>'.$eol.$display.
                '</body>'.$eol.
                '</html>';
          }else{
            echo $body;
          }

            // echo $body;
            die;
    }

}



