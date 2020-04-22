<?php
namespace Core;

class Notification
{
    static public function notify($group)
    {

        foreach($_SESSION['core']['notification']['errors'][$group] as $e){
            
            echo'
            <script>
            $(document).ready(function(){
              $.toast({
                title: "c0r3",
                content: "'.$e.'",
                type: "warning",
                delay: 5000
              });
            })
            </script>
            ';
          }
      
          unset($_SESSION['core']['notification']['errors'][$group]);

    }
}
