<?php
Namespace Core\Models\FormElements;
/**
 *
 */
class Submit
{

  public $name;
  public $label;
  private $classes;

  function __construct($settings = NULL)
  {
    $this->value = (isset($settings['value']) ? $settings['value'] : NULL);
    $this->label = (isset($settings['label']) ? $settings['label'] : NULL);
    $this->classes = (isset($settings['classes']) ? $settings['classes'] : NULL);
  }

  public function render()
  {
    echo '<button type="submit" name="submit" value="'.$this->value.'" class="'.$this->classes.'">'.$this->label.'</button>';
  }

}

?>
