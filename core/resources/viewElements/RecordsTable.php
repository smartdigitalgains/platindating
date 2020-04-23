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
    $this->fields = ((isset($data['fields']) ) ? $data['fields'] : NULL);
    $this->showFields = ((isset($data['showFields']) ) ? $data['showFields'] : NULL);
    $this->opttions = ((isset($data['options']) ) ? $data['options'] : NULL);
  }

  public function render()
  {

    if($records = \Core\Db\Query::select($this->model, $this->fields)){
      echo '<pre>';
      print_r($records);
      echo '</pre>';
      echo '
      <div class="card table-responsive">
      <div class="card-header">
        Records
      </div>
      <table class="table table-hover">
      <thead class="thead-dark">
      <tr>
      ';

      foreach($records[0] as $key => $val){
        if(in_array($key, $this->showFields)){
          echo '<td>'.$key.'</td>';
        }
      }

      echo'
      <td>Aktionen</td>
      </tr>
      </thead>
      <tbody>
      ';

      foreach($records as $column){
        echo '<tr>';
        foreach ($column as $key => $val) {
          if(in_array($key, $this->showFields)){
            echo '<td>'.$val.'</td>';
          }
        }

        echo '
        <td>
          <a href="/form/'.\Core\Models\Controller::getShortName($this->model).'"><button type="button" class="btn btn-primary">Bearbeiten</button></a>
          <button type="button" class="btn btn-danger">Löschen</button>
        </td>
        ';

        echo '</tr>';
      }

      echo'
        </tbody>
      </table>
      <div class="card-footer text-muted">
        ('.count($records).') Records
      </div>
      </div>
      ';

    }


  }

}

 ?>
