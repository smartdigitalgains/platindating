<?php
namespace Core;
/**
 *
 */
class Router
{

  private static $activeRoute;
  private static $routesNamespace;
  private static $action;
  private static $uid;

  function __construct()
  {

    self::$routesNamespace = 'Core\Resources\Routes';
    self::$action = (!empty($_GET['a'])) ?  $_GET['a'] : "/";
    self::$uid = (!empty($_GET['uid'])) ?  $_GET['uid'] : NULL;

  }

  static function loadRoutes()
  {

    unset($_SESSION['routes']);

    foreach(\get_declared_classes() as $key => $route){

      if(strpos($route, self::$routesNamespace) === 0){

        $_SESSION['routes'][] = new $route;

      }

      if(strpos($route, '\Core\Resources\Forms') === 0){

        $_SESSION['forms'][] = new $route;

      }

    }

  }

  static function checkIfRouteExists(){

    foreach($_SESSION['routes'] as $route){
      if(self::$action == $route->slug){
        self::$activeRoute = $route;
        return true;
      }
    }

  }

  static function setSession()
  {
    //last route
    if (!isset($_SESSION['core']['router']['referrer'])) {
        $_SESSION['core']['router']['lastRoute'] = $_SERVER['REQUEST_URI'];
        $_SESSION['core']['router']['referrer'] = $_SERVER['REQUEST_URI'];
    } 
    else {

        if($_SERVER['REQUEST_URI'] != $_SESSION['core']['router']['referrer']){

            $_SESSION['core']['router']['lastRoute'] = $_SESSION['core']['router']['referrer'];
            $_SESSION['core']['router']['referrer'] = $_SERVER['REQUEST_URI'];
        }
        
    }

  }

  static function route()
  {

    self::loadRoutes();

    self::setSession();

    if(self::checkIfRouteExists()){

      self::$activeRoute->route();

    }

  }

}

 ?>
