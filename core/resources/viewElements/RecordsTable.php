<?php
Namespace Core\Resources\ViewElements;

/**
 *
 */
class RecordsTable
{

  private $model;

  function __construct($data)
  {
    $this->model = new $data['model'];
    $this->actions = ((isset($data['actions']) ) ? $data['actions'] : NULL);
  }

  public function render()
  {

    if($records = \Core\Models\Controller::getRepositories($this->model)){

      echo '
      <div class="container">
      <table class="table table-dark table-hover table-responsive">
      <thead class="thead-dark">
      <tr>
      ';

      foreach($records[0] as $key => $val){
        echo '<td>'.$key.'</td>';
      }

      echo'
      </tr>
      </thead>
      <tbody>
      ';

      foreach($records as $column){
        echo '<tr>';
        foreach ($column as $key => $val) {
          echo '<td>'.$val.'</td>';
        }

        echo '
        <td>
          <button type="button" class="btn btn-primary">Bearbeiten</button>
          <button type="button" class="btn btn-danger">Löschen</button>
        </td>
        ';

        echo '</tr>';
      }

      echo'
        </tbody>
      </table>
      </div>
      ';

    }


  }

}

 ?>
