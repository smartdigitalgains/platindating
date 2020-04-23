<?php
Namespace Core\Resources\ViewElements;

/**
 *
 */
class FormsTable
{

  function __construct()
  {

  }

  public function render()
  {

    echo '
    <div class="container table-responsive">
    <h2>Forms</h2>
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <td>Name</td>
        <td>Aktionen</td>
    </tr>
    </thead>
    <tbody>
    ';

    foreach($_SESSION['forms'] as $form){
      echo '
      <tr>
        <td>'.$form->label.'</td>
      <td>
        <a href="/form/'.\Core\Models\Controller::getShortName($form).'"><button type="button" class="btn btn-primary">Öffnen</button></a>
      </td>
      </tr>
      ';
    }

    echo'
      </tbody>
    </table>
    </div>
    ';


  }

}

?>
