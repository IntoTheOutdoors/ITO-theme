<?php 
    function pre($r, $callback = 'print_r') {
        echo '<pre>'.call_user_func('print_r', $r, 1).'</pre>';
    }
    
    function pre_print_r($r, $clean = true) {
        $r =  print_r($r, 1);
        if($clean)
            $r =  esc_html($r);
                
        echo '<pre>'.$r.'</pre>';
    }
?>