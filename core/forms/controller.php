<?php
Namespace Core\Forms;
use Core\Db\Migrate;

/**
 * Forms
 * This Class handles
 * Rendering and Database Migration of Forms
 * Forms are defined as as model
 * Models contain:
 * - form elements as objects
 * - database schema for migration
 *
 * To render a form handle database migration simple call \Core\Forms\Controller::render('\Your\Form\Model');
 *
 * TODO:
 * - implement restriction validation e.g. input types, required, min & max length
 * - change unique identifier to own column with hash value
 */
class Controller
{


  public function __construct() {

  }

  static function render($model)
  {

    if(isset($model)){

      if(isset($_POST) && !empty($_POST) && $_POST['submit'] == \Core\Models\Controller::getShortName($model)){

        \Core\Models\Controller::set($model, 'data',  $_POST);

        if($t = (isset($_POST['token'])) ?  $_POST['token'] : FALSE){

          if(Modules\Tokens::validateToken($t)){

            if(Modules\Validator::validateRestrictions($model))
            {

              Migrate::migrate($_POST, $model);

              Modules\Validator::finish($model);

            }
            else{
              Modules\Validator::errorInfo();
            }

          }

        }

      }

      Modules\Messages::show();

      Modules\Builder::build($model);

    }

  }

}

?>
