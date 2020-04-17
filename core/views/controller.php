<?php
Namespace Core\Views;
/**
 *
 */
class Controller
{

  private static $model;

  function __construct($model)
  {
    self::$model = new $model;
  }

  static function render()
  {
    Modules\Compiler::compile(self::$model);
  }

}

?>
