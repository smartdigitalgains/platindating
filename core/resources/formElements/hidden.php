<?php
Namespace Core\Resources\FormElements;
/**
 *
 */
class Hidden
{

  public $name;
  private $value;

  function __construct($settings = NULL)
  {
    $this->name = (isset($settings['name']) ? $settings['name'] : NULL);
    $this->value = (isset($settings['value']) ? $settings['value'] : NULL);
  }

  public function render()
  {
    echo '<input type="hidden" name="data['.$this->name.']" value="'.$this->value.'" />';
  }

}

?>
