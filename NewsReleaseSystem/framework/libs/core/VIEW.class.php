<?php
class VIEW{
    public static $view;
    /**
     * 工厂类实现完成视图引擎配置
     * @param unknown $viewType
     * @param unknown $config
     */
    public static function init($viewType,$config){
        /*
         * $smarty= new Smatry();//实例化smarty
         * $smarty->left_delimter=$config["left_delimiter"];//左定界符
         * $smarty->right_delimiter=$config["right_delimiter"];//右定界符
         * $smarty->template_dir=$config["template_dir"];//html模板的地址
         * $smarty->compile_dir=$config["compile_dir"];//缓存编译生成的文件
         * $smarty->cache_dir=$config["cache_dir"];//缓存
         */
//         print_r($config);exit();
        self::$view=new $viewType();
        foreach ($config as $key=>$value){
            self::$view->$key=$value;
        }
    }
    /**
     * 视图工厂类实现在smarty中注册变量，把单一变量注册改善为多变量注册
     * @param unknown $arr
     */
    public static  function assign($arr){
        foreach ($arr as $key =>$value){
            self::$view->assign($key,$value);//在smarty中注册变量
        }
    }
    /**
     * 视图工厂类实现html模板路径指向
     * @param unknown $template
     */
    public static function display($template){
        self::$view->display($template);
    }
}