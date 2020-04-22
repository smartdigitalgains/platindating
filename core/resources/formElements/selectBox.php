<?php
Namespace Core\Resources\FormElements;
/**
 *
 */
class SelectBox
{

  public  $name;
  public  $label;
  private $classes;
  public  $restrictions;

  function __construct($settings = NULL)
  {

    $this->options = (isset($settings['options']) ? $settings['options'] : NULL);
    $this->name = (isset($settings['name']) ? $settings['name'] : NULL);
    $this->label = (isset($settings['label']) ? $settings['label'] : NULL);
    $this->classes = (isset($settings['classes']) ? $settings['classes'] : NULL);
    $this->restrictions = (isset($settings['restrictions']) ? $settings['restrictions'] : NULL);
    $this->populate = (isset($settings['populate']) ? $settings['populate'] : NULL);
  }

  public function render($value)
  {

    if(isset($this->populate)){
      $repositories = \Core\Models\Controller::getRepositories($this->populate['model']);
    }

    echo '
    <div class="form-group">
      <label for="data['.$this->name.']">'.$this->label.'</label>
      <select class="form-control" name="data['.$this->name.']" class="'.$this->classes.'">
        <option selected disabled>'.$this->label.'</option>
    ';

    if(isset($repositories) && !empty($repositories)){
      foreach($repositories as $r){
        echo '<option '.(($value == $r['uid']) ? 'selected' : NULL).' value="'.$r['uid'].'">'.$r[$this->populate['label']].'</option>';
      }
    }
    if(!empty($this->options)){
      foreach($this->options as $o){
        echo '<option '.(($value == $o['value']) ? 'selected' : NULL).' value="'.$o['value'].'">'.$o[['label']].'</option>';
      }
    }

    echo'
    </select>
    </div>
    ';

  }

}

?>
