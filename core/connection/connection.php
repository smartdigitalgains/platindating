<?php
namespace Core;
/**
 *
 */
class Connection
{

  private $prefix;

  function __construct()
  {

    $this->prefix = "platindating";

  }

  public function get($var)
  {
    return $this->$var;
  }

  static public function connect(){
    return new \PDO('mysql:dbname=platinda_platindating;host=localhost;charset=utf8mb4', 'platinda_gatekeeper', '9WT!bAmc45b-');
  }

}

 ?>
