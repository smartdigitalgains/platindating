<?php
Namespace Core\Forms\Modules;

use \Core\Models\FormElements\Submit;
use \Core\Models\FormElements\Hidden;
/**
 *
 */
class Builder
{

  function __construct()
  {
  }

  static function build($model)
  {

    echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';

    //Set Cross Site Security Token
    Tokens::newToken();

    //Render Form Model Elements
    foreach(\Core\Models\Controller::get($model, 'elements') as $key => $element){

      $element->render(
        ((isset(\Core\Models\Controller::get($model, 'data')['data'][$element->name]))
        ?
        \Core\Models\Controller::get($model, 'data')['data'][$element->name] : NULL)
      );

    }

    (new Submit([
      "label" => "Absenden",
      "value" => \Core\Models\Controller::getShortName($model)
    ]))->render();

    echo '</form>';

  }



}

?>