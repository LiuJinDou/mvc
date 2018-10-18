<?php

/**

* fastphp框架核心

*/

class Fastphp

{

    protected $_config = array();

    public function __construct($config)
    {
        $this->_config = $config;
    }

    // 运行程序
    public function run()

    {
        spl_autoload_register(array($this, 'loadClass'));
        $this->storageMode();
        $this->removeMagicQuotes();
        $this->route();

    }
    // 根据路由方式获取控制器、操作名
    public function handleRoute()
    {
        //路由方式
        $type = $this->_config['route']['target'];
        // 获取访问地址
        $url = $_SERVER['REQUEST_URI'];
        // 处理路由
        $url = trim($url,"/");
        if($type=='fullPath'){
            $routeInfo = explode('?', $url);
            $cmInfo = explode('&',$routeInfo[1]);
            foreach ($cmInfo as $key => $value) {
                $cmInfo_new[] = explode('=',$value)[1];
            }
            // 控制器名
            $visitController = ucfirst($cmInfo_new[0]);
            // 方法名
            $visitMethod = $cmInfo_new[1];
        }elseif ($type=='simplePath') {
            $routeInfo = explode('/',$url);
            // 控制器名
            $visitController = isset($routeInfo[0]) ? $routeInfo[0] :'';
            // 方法名
            $visitMethod = isset($routeInfo[1]) ? $routeInfo[1] :'';
        }
        $return = array(
            'controller' =>!empty($visitController) ? $visitController : $this->_config['defaultController'] , 
            'action' =>!empty($visitMethod) ? $visitMethod : $this->_config['defaultAction'] , 
        );
        return $return;

    }
    // 路由处理

    public function route()

    {
        $visitInfo = $this->handleRoute();
        // 控制器名
        $visitController = !empty($visitInfo['controller']) ? $visitInfo['controller'] : 'Index';
        // 方法名
        $visitMethod = !empty($visitInfo['action']) ? $visitInfo['action'] : 'show';
        // 实例化类
        $visitObj = new $visitController($visitController,$visitMethod);
        // 调用方法
        // $visitObj->$visitMethod();die;
        // $dispatch保存控制器实例化后的对象，我们就可以调用它的方法，
        // 也可以像方法中传入参数，以下等同于：$dispatch->$actionName($param)
        call_user_func_array(array($visitObj, $visitMethod), array());


    }


    // 删除敏感字符
    public function stripSlashesDeep($value)
    {

        $value = is_array($value) ? array_map(array($this,'stripSlashesDeep'),$value) : addslashes($value);
        return $value;
    }

    // 检测敏感字符并删除
    public function removeMagicQuotes()
    {
        // var_dump(get_magic_quotes_gpc());die;
        // if(get_magic_quotes_gpc()){
            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET) : '';
            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST) : '';
            $_REQUEST = isset($_REQUEST) ? $this->stripSlashesDeep($_REQUEST) : '';
            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : '';
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : '';
        // }
    }

    //处理session存储的方式、默认存session文件
    public function storageMode()
    {
        $Mode = $this->_config['session']['target'];
        if($Mode!=='files'){
            $path =  $this->_config['session'][$Mode]['path'];//存储路径
            $handler =  $this->_config['session'][$Mode]['handler'];//存储方式
            ini_set('session.save_path', $path);//修改配置文件
            ini_set('session.save_handler', $handler);
        }
    }

    /**
     * [loadClass 类的自动加载]
     */
    public function loadClass($class)
    {
        $freamWork = APP_PATH."vendor/".$class.'.php';
        $controller = APP_PATH."application/controllers/".$class.'.php';
        $model = APP_PATH."application/models/".$class.'.php';
        $view = APP_PATH."application/views/".$class.'.php';
        $classes = APP_PATH."classes/".$class.'.php';
        // echo $classes;
        if(file_exists($freamWork)){
            include $freamWork;
        }elseif (file_exists($controller)) {
            include $controller;
        }elseif (file_exists($view)) {
            include $view;
        }elseif (file_exists($model)) {
            include $model;
        }elseif (file_exists($classes)) {
            include $classes;
        }
    }
}
