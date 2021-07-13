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

    function customize_iframe($video) {
        preg_match('/src="(.+?)"/', $video, $matches);
        $src = $matches[1];

        preg_match('/width="(.+?)"/', $video, $matches);
        $updated_width = $matches[1];



        // Add extra parameters to src and replcae HTML.
        $params = array(
            'controls'  => 1,
            'hd'        => 1,
            'autohide'  => 1,
            'autoplay' => 1,
        );
        $new_src = add_query_arg($params, $src);

        $video = str_replace($src, $new_src, $video);

        // Add extra attributes to iframe HTML.
        // $attributes = 'frameborder="0"';
        // $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
        // Display customized HTML.
        return $new_src;

    }
?>