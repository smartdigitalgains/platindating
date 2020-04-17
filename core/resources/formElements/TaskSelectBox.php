<?php
Namespace Core\Resources\FormElements;
/**
 *
 */
class TaskSelectBox
{

  public  $name;
  public  $label;
  private $classes;
  public  $restrictions;

  function __construct($settings = NULL)
  {
    $this->name = (isset($settings['name']) ? $settings['name'] : NULL);
    $this->label = (isset($settings['label']) ? $settings['label'] : NULL);
    $this->classes = (isset($settings['classes']) ? $settings['classes'] : NULL);
    $this->restrictions = (isset($settings['restrictions']) ? $settings['restrictions'] : NULL);
  }

  public function render($value)
  {

    $tasks = \Core\Utilities::getClassesInNamespace('Core\Cron\Tasks');

    echo '
    <select name="data['.$this->name.']" class="'.$this->classes.'">
      <option selected disabled>'.$this->label.'</option>
    ';

    if(!empty($tasks)){

      foreach($tasks as $k => $t){

        $d = \Core\Utilities::reflect($t);

        echo '<option value="'.$d['shortName'].'">'.$d['shortName'].'</option>';

      }

    }

    echo'
    </select>
    ';
  }

}

?>
