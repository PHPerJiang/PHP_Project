<?php
class indexController{
    /**
     * 显示主页新闻
     */
    public function index(){
        $obj=M('news');
        if($_POST){
            $data=$obj->seeknews($_POST['seek']);
        }else {
            $data=$obj->newslist();
        }
        $about=$this->showAbout();
        VIEW::assign(array('data'=>$data,'about'=>$about));
        VIEW::display('index/index.html');
    }
    /**
     * 控制显示关于我们信息
     * @return unknown
     */
    public function showAbout(){
        $obj=M('about');
        $data=$obj->getAboutInfo();
        return $data;
    }
    /**
     * 控制显示具体某一篇文章
     */
    public function newsInfo(){
       if(!empty($_GET['id'])){
            $obj=M('newsInfo');
            $data=$obj->getNewsInfo(intval($_GET['id']));
            $about=$this->showAbout();
            VIEW::assign(array('data'=>$data,'about'=>$about));
            VIEW::display('index/show.html');
        }
    }
}