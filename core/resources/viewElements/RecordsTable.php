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
      <div class="container table-dark">
      <table class="table table-hover">
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

        if($this->actions){

          foreach($this->actions as $key => $action){

            if($action){

              switch ($key) {

                case 'view':

                  echo '<td><a href="'.$column['uid'].'">View</a></td>';

                break;

                case 'delete':

                echo '<td><a href="'.$column['uid'].'">Delete</a></td>';

                break;

              }

            }

          }

        }

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
