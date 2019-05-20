<?php
class Test{
    public function abc(){
        $ci = & get_instance();
        $ci->load->helpers('array');
        echo "<br/>".element('shape', $array = array(
            'color' => 'red',
            'shape' => 'round',
            'size'  => ''
        ), 'Not Found');
        echo "<br/> 'abc' function of Test Library.";
    }
}