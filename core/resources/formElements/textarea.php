<?php
Namespace Core\Resources\FormElements;
/**
 *
 */
class TextArea
{

  public $name;
  public $label;
  private $classes;
  public $restrictions;

  function __construct($settings = NULL)
  {
    $this->name = (isset($settings['name']) ? $settings['name'] : NULL);
    $this->label = (isset($settings['label']) ? $settings['label'] : NULL);
    $this->classes = (isset($settings['classes']) ? $settings['classes'] : NULL);
    $this->restrictions = (isset($settings['restrictions']) ? $settings['restrictions'] : NULL);
  }

  public function render($value)
  {
    echo '
    <div class="form-group">
      <label for="data['.$this->name.']">'.$this->label.'</label>
      <textarea class="form-control" placeholder="'.$this->label.'" name="data['.$this->name.']" class="'.$this->classes.'">'.$value.'</textarea>
    </div>
    ';
  }

}

?>
