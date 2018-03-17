<?php
class newsInfoModel{
    private $table='news';
    /**
     * 接收传入id,返回id号文章全部内容
     * @param unknown $id
     * @return rs
     */
    public function getNewsInfo($id){
       $sql="select * from $this->table where id= $id";
//        die($sql);
       return  DB::findOne($sql);
    }
}