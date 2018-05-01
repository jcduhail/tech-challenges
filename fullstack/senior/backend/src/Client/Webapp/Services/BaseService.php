<?php

namespace Client\Webapp\Services;

class BaseService
{
    private $arr_data = array();
    
    public function __construct()
    {
        $this->init_data();
    }
    
    public function init_data(){
        $array = scandir('data');
        foreach($array as $key=>$file){
            if($file!='.' && $file!='..'){
                $this->arr_data[] = json_decode(file_get_contents('data/'.$file));
            }
        }
    }
    
    public function get_data(){
        return $this->arr_data;
    }

}
