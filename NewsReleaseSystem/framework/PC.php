<?php
$currentdir=dirname(__FILE__);//获取当前文件路径
require_once 'require.list.php';//引入require类库列表
//循环引入require列表中的路径
 foreach ($paths as $key){
//      die($currentdir.'/'."$key");
    require_once ($currentdir.'/'."$key");
}
class PC{
    public static $controller;
    public static $method;
    private static $config;
    private static $dbType='mysql';//这里设置数据库类型
    private static $viewType='Smarty';//这里设置视图引擎类型
    /**
     * 初始化数据库类型和完成数据库连接
     */
    private static function init_db(){
        DB::connect(self::$dbType, self::$config['dbconfig']);
    }
    /**
     * 初始化试图引擎
     */
    private static function init_view(){
        VIEW::init(self::$viewType, self::$config['viewconfig']);
    }
    /**
     * 初始话控制器，如果get到的controller有内容则用此内容否则默认为index
     */
    private static function init_Controller(){
        self::$controller=isset($_GET['controller'])?checkStr($_GET['controller']):'index';
    }
    /**
     * 初始化方法,如果get到的方法有内容吗则用此内容，否则默认为index
     */
    private static function init_Method(){
        self::$method=isset($_GET['method'])?checkStr($_GET['method']):'index';
    }
    //PC引擎启动程序
    public static function run($config){
        self::$config=$config;
        self::init_db();
        self::init_view();
        self::init_Controller();
        self::init_Method();
        C(self::$controller, self::$method);
    }
}
