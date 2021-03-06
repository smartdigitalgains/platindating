<?php
Namespace Core\Db;
/**
 *
 */
class Query
{

  private static $connection;
  private static $model;
  private static $post;
  private static $table;
  private static $lastInsertId;
  private static $reservedFields;

  function __construct()
  {
    self::$connection = new \Core\Connection();
    self::$model = $model;
  }

  static function findAll($model)
  {
    $qb = new \Core\Connection();

    if($q = $qb->connect()->query("SELECT * FROM ".$qb->get('prefix').'_'.lcfirst(\Core\Models\Controller::getShortName($model)))){
      return $q->fetchAll(\PDO::FETCH_ASSOC);
    }
  }

  static function select($model, $fields)
  {
    $qb = new \Core\Connection();

    $stmt = "SELECT ";

    foreach($fields as $key => $field){

      $seperator = ((array_key_last($fields) == $key) ? NULL : ',');

      $stmt .= "".$field."".$seperator;

    }

    $stmt .= " FROM ".$qb->get('prefix').'_'.lcfirst(\Core\Models\Controller::getShortName($model));

    if($q = $qb->connect()->query($stmt)){
      return $q->fetchAll(\PDO::FETCH_ASSOC);
    }
  }

  static function selectSingle($model, $uid, $fields)
  {
    $qb = new \Core\Connection();

    $stmt = "SELECT ";

    foreach($fields as $key => $field){

      $seperator = ((array_key_last($fields) == $key) ? NULL : ',');

      $stmt .= "".$field."".$seperator;

    }

    $stmt .= " FROM ".$qb->get('prefix').'_'.lcfirst(\Core\Models\Controller::getShortName($model));
    $stmt .= " WHERE uid = ".$uid;

    if($q = $qb->connect()->query($stmt)){
      return $q->fetch(\PDO::FETCH_ASSOC);
    }
  }

}

?>
