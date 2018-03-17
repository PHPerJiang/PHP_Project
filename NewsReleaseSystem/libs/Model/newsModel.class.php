<?php
class newsModel{
    private $table='news';
    /**
     * 查询文章总数
     * @return int
     */
    public function getNewsCount(){
        $sql="select count(*) from $this->table";
        $result=DB::query($sql);
        $data=mysqli_fetch_row($result);
        return isset($data[0])?$data[0]:0;
    }
    /**
     * 添加修改文章
     * @param post来的数据 $data
     * @return number
     */
    public function newssubmit($data){
        extract($data);//把数组变为变量
       if(empty($title)||empty($content)){
           return 0;
       }
       $title=checkStr($_POST['title']);
       $content=checkStr($_POST['content']);
       $author=checkStr($_POST['author']);
       $from=checkStr($_POST['from']);
       $arr=array(
           'title'=>$title,
           'content'=>$content,
           'author'=>$author,
           'from'=>$from,
           'dateline'=>time()
       );
       if($_POST['id']!=''){
           $id=intval($_POST['id']);
           DB::update($this->table, $arr, "id=$id");
           return 2;
       }else {
           DB::insert($this->table, $arr);
           return  1;
       }
    }
    /**
     * 删除数据
     * @param int $id
     */
    public function newsDelete($id){
       DB::delete($this->table, 'id='.$id);
       return 1;
    }
   /**
    * 后台文章管理列表
    * @return unknown|array
    */ 
    public function newslist(){
        $sql="select * from ".$this->table." order by dateline desc";
        $result=DB::query($sql);
        return $this->findnews($result);
    }
    private function findnews($result){
        if($result&&mysqli_num_rows($result)!=0){
            while ($row=mysqli_fetch_assoc($result)){
                $row['content']=mb_substr($row['content'], 0,200);
                $row['dateline']=date('Y-m-d H:i:s',$row['dateline']);
                $data[]=$row;
            }return $data;
        }else {
            return array();
        }
    }
    public function seeknews($str){
        checkStr($str);
        $sql="select * from $this->table where title like '%$str%'";
        $result=DB::query($sql);
        return $this->findnews($result);
    }
}