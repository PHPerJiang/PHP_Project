<?php
class DB{
    public static $db;
    /**
     * DB工厂利用mysql类中方法实现连接
     * @param db类型 $dbType
     * @param db参数 $config
     */
    public static function connect($dbType,$config){
        self::$db=new $dbType();
        self::$db->connect($config);
    }
    /**
     * DB工厂利用mysql类中方法实现执行sql语句
     * @param string $sql
     * @return 结果集
     */
    public static function query($sql){
        return self::$db->query($sql);
   }
   /**
    * 返回结果集中的所有记录
    * @param string $sql
    * @return array
    */
   public static function findAll($sql){
       return self::$db->findAll(self::query($sql));
       
   }
  /**
   * 返回结果集中的单条记录
   * @param unknown $sql
   * @return rs
   */
  public static function findOne($sql){
      return self::$db->findOne(self::query($sql));
  }
   /**
    * 插入数据
    * @param 表名 $table
    * @param 插入数据数组 $arr
    * @return 插入成功返回插入数据id
    */
  public static function insert($table,$arr){
      return self::$db->insert($table,$arr);
  }
  /**
   * 修改数据
   * @param 表名 $table
   * @param 数据数组 $arr
   * @param 条件 $where
   */
  public static function update($table,$arr,$where){
      self::$db->update($table,$arr,$where);
  }
  /**
   * 删除数据
   * @param 表名 $table
   * @param 条件 $where
   */
  public static function delete($table,$where){
      self::$db->delete($table,$where);
  }
}