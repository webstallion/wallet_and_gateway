<?php 
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
    }
}
