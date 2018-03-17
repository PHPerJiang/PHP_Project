<?php
class indexModel{
    private  $table='news';
    /**
     * 通过倒叙时间顺序查询文章
     * @return array
     */
    public function findArticleByDateline(){
        $sql="select * from ".$this->table." order by dateline desc";
        return DB::findAll($sql);
    }
    public function getNewsByDateline(){
        $data=$this->findArticleByDateline();
        if(isset($data)){
            return $data;
        }else {
            return array();
        }
    }
 
}