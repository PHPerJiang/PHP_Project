<?php
class adminController{
   public $user='';
   public function __construct(){
       $obj=M('login');
       $this->user=$obj->getUser();
       if(empty($this->user)&&(PC::$method!='login')){
           $this->showMessages('您还未登录，请先登陆', 'index.php?controller=admin&method=login');
       }
   }

   /**
    * 显示后台文章数量
    */
    public function index(){
       $obj=M('news');
       $newsCount=$obj->getNewsCount();
       VIEW::assign(array('newsCount'=>$newsCount));
       VIEW::display('admin/index.html');
   }
   /**
    * 管理新闻界面文章列表
    */
   public function newslist(){
       $obj=M('news');
       $data=$obj->newslist();
       VIEW::assign(array('data'=>$data));
       VIEW::display('admin/newslist.html');
   }
   /**
    * 添加修改文章
    */
   public function newsadd(){
       //如果没有post数据则为从文章管理界面到修改文章界面，根据文章id号查询原文章
       if(empty($_POST)){
          if(isset($_GET['id'])){
              $obj=M('newsInfo');
              $data=$obj->getNewsInfo(intval($_GET['id']));
          }else {
              $data=array();
          }
          VIEW::assign(array('data'=>$data));
          VIEW::display('admin/newsadd.html');
       }else {//如果有post数据说名为添加文章或者修改完成后提交的文章
            $this->newssubmit();
       }

   }
   private function newssubmit(){
       $obj=M('news');
       $data=$obj->newssubmit($_POST);
       if($data==0){
           $this->showMessages('文章标题或内容不能为空！', 'index.php?controller=admin&method=newsadd');
       }elseif ($data==1){
           $this->showMessages('添加文章成功', 'index.php?controller=admin&method=newsadd');
       }elseif ($data==2){
           $this->showMessages('修改文章成功！', 'index.php?controller=admin&method=newslist');
       }else{
           $this->showMessages('操作失败！', 'index.php?controller=admin&method=newsadd');
       }
   }
  /**
   * 删除文章
   */ 
   public function newsdel(){
       $obj=M('news');
       $rs=$obj->newsDelete(intval($_GET['id']));
       if($rs==1){
           $this->showMessages('文章删除成功', 'index.php?controller=admin&method=newslist');
       }else {
           $this->showMessages('文章删除失败', 'index.php?controller=admin&method=newslist');
       }
   }
 /**
  * 显示错误信息
  * @param string $info
  * @param string $url
  */
   public function showMessages($info,$url){
     echo "<script>alert('$info');window.location.href='$url';</script>";
   }
   /**
    * 页面重定向
    * @param unknown $url
    */
   public function redirectUrl($url){
       echo "<script>window.location.href='$url';</script>";
   }
   /**
    * 登陆程序
    */
   public function login(){
       if($_POST){
           $obj=M('login');
          if($obj->checkLogin()){
              $this->redirectUrl('index.php?controller=admin&method=index');
          }else {
              $this->showMessages('账号或密码错误', 'index.php?controller=admin&method=login');
          }
       }else {
           VIEW::display('admin/login.html');
       }
   }
  /*
   * 退出登陆程序
   */
   public function logout(){
       $obj=M('login');
       $obj->logout();
       $this->redirectUrl('index.php?controller=admin&method=login');
   }
}