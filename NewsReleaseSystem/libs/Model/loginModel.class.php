<?php
class loginModel{
    private $table='admin';
    private $user='';//存储session
    public function __construct(){
        if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
            $this->user=$_SESSION['user'];
        }
    }
    /**
     * 一系列登陆验证
     * @return boolean
     */
    public function  checkLogin(){
        if(empty($_POST['username'])||empty($_POST['password'])){
            return false;
        }
        $username=checkStr($_POST['username']);
        $password=checkStr($_POST['password']);
        if($this->user=$this->checkUser($username, $password)){
            $_SESSION['user']=$this->user;
            return true;
        }else {
            return false;
        }
    }
    /**
     * 用户验证
     * @param unknown $username
     * @param unknown $password
     * @return rs|boolean
     */
    private function checkUser($username,$password){
        $sql="select * from $this->table where username='$username'";
        $user=DB::findOne($sql);
        if(isset($user)&&!empty($user)&&$user['password']==$password){
            return $user;
        }else {
            return false;
        }
        
    }
    public function getUser(){
        return $this->user;
    }
    public function logout(){
        unset($_SESSION['user']);
        $this->user="";
    }
}