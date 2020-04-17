<?php
Namespace Core\Models;
/**
 *
 */
class Controller
{

  public static function getShortName($model)
  {
    return (new \ReflectionClass($model))->getShortName();
  }

  static function get($model, $var)
  {
    return ((isset($model->$var)) ? $model->$var : False);
  }

  static function getRepositories($model)
  {
    $qb = new \Core\Connection();

    if($q = $qb->connect()->query("SELECT * FROM ".$qb->get('prefix').'_'.lcfirst(self::getShortName($model)))){
      return $q->fetchAll(\PDO::FETCH_ASSOC);
    }
  }

  static function set($model, $var, $value)
  {
    return $model->$var = $value;
  }



}

?>
