<?php
class aboutModel{
    /**
     * 返回关于我们的文本信息
     * @return string
     */
    public function getAboutInfo(){
        return file_get_contents('data/about.txt');
    }
}