<?php
Namespace Core\Db;
/**
 *
 */
class Migrate
{

  private static $connection;
  private static $model;
  private static $post;
  private static $table;
  private static $lastInsertId;
  private static $reservedFields;

  function __construct()
  {
  }

  static function migrate($post, $model)
  {

    self::$connection = new \Core\Connection();
    self::$model = $model;
    self::$post = $post;
    self::$table = self::$connection->get('prefix').'_'.lcfirst(\Core\Models\Controller::getShortName($model));
    self::$reservedFields = ["uid", "pid"];

    //check if database exists
    if(!self::checkIfTableExists()){

      //create database
      self::createTable();

    }
    elseif(self::checkIfTableExists()){

      self::alterTable();

    }

    //insert or update repository
    if(self::updateRepository()){

      //redirect to repository
      $_SESSION['core']['forms']['messages'][] = 'Record was created.';

    }

  }

  static function checkIfTableExists()
  {
    $qb = self::$connection->connect();

    if($qb->query("SELECT count(*) FROM ".self::$table)){
      return true;
    }
    else{
      return false;
    }


  }

  static function createTable()
  {
    $qb = self::$connection->connect();

    $sql = "";
    foreach(self::$model->get('schema') as $column){
      $sql .= " `".$column['column']."` ".$column['type'].", ";
    }

    $query =$qb
    ->prepare(
      "CREATE TABLE `".self::$table."` (
      `uid` INT(8) NOT NULL AUTO_INCREMENT,
      $sql
      PRIMARY KEY (`uid`),
      UNIQUE (`uid`)
      )"
    );

   if($result = $query->execute()) return true;

   return false;

  }

  static function alterTable()
  {
    $qb = self::$connection->connect();

    foreach(self::$model->get('schema') as $column){

      if(!count($qb->query("SHOW COLUMNS FROM ".self::$table." LIKE '".$column['column']."'")->fetchAll())){

        $q= $qb->prepare(
          "
            ALTER TABLE ".self::$table."
            ADD ".$column['column']." ".$column['type'].";
          "
        );

        $q->execute();

      }

    }

    foreach(array_diff(
      \Core\Utilities::createArrayFromArrayKey($qb->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".self::$table."'")->fetchAll(\PDO::FETCH_ASSOC), 'COLUMN_NAME'),
      \Core\Utilities::createArrayFromArrayKey(self::$model->get('schema'), 'column')
    ) as $deletedColumn){

      if(!in_array($deletedColumn, self::$reservedFields)){

        $q= $qb->prepare(
          "ALTER TABLE ".self::$table."
           DROP ".$deletedColumn
        );

        $q->execute();

      }

    }


  }

  static function updateRepository()
  {

    $qb = self::$connection->connect();

    $stmt = "INSERT INTO ".self::$table." (";

    foreach(self::$post['data'] as $key => $element){

      $seperator = ((array_key_last(self::$post['data']) == $key) ? NULL : ',');

      $stmt .= $key.$seperator;
    }

    $stmt .= ") VALUES (";

    foreach(self::$post['data'] as $key => $element){

      $seperator = ((array_key_last(self::$post['data']) == $key) ? NULL : ',');

      $stmt .= "'".$element."'".$seperator;
    }

    $stmt .= ") ON DUPLICATE KEY UPDATE ";

    foreach(self::$post['data'] as $key => $element){

      $seperator = ((array_key_last(self::$post['data']) == $key) ? NULL : ',');

      $stmt .= $key."='".$element."'".$seperator;
    }

    $query = $qb
    ->prepare($stmt)
    ->execute();

    self::$lastInsertId = $qb->lastInsertId();

    if($query) return true;

    return  false;

  }

}

?>
