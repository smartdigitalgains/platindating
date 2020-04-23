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

    unset($_SESSION['routes']);
    unset($_SESSION['forms']);

    foreach(\get_declared_classes() as $key => $route){

      if(strpos($route, self::$routesNamespace) === 0){

        $_SESSION['routes'][] = new $route;

      }

      if(strpos($route, 'Core\Resources\Forms') === 0){

        $_SESSION['forms'][] = new $route;

      }

    }

    //Set UID
    if(isset($_GET['uid'])){
      $_SESSION['core']['router']['uid'] = $_GET['uid'];
    }

    //Set RID
    if(isset($_GET['rid'])){
      $_SESSION['core']['router']['rid'] = $_GET['rid'];
    }


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

    self::setSession();

    if(self::checkIfRouteExists()){

      self::$activeRoute->route();

    }

  }

}

 ?>
