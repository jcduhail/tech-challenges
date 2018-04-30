<?php

namespace Client\Webapp\Services;

class SurveysService extends BaseService
{

    public function getSurvey($type,$code){
        $arrOptions = array();
        $sum = 0;
        $nb_surveys = 0;
        foreach($this->get_data() as $survey){
            if($survey->survey->code == $code){
                foreach($survey->questions as $question){
                    if($question->type == $type){
                        if(is_array($question->options)){
                            foreach ($question->options as $key=>$option){
                                if($question->answer[$key]){
                                    if(isset($arrOptions[$option])){
                                        $arrOptions[$option]++;
                                    }else{
                                        $arrOptions[$option] = 1;
                                    }
                                }elseif(!isset($arrOptions[$option])){
                                    $arrOptions[$option] = 0;
                                }
                            }
                        }elseif(isset($question->answer)){
                            $sum +=  $question->answer;
                            $nb_surveys++;
                        }
                        continue;
                    }
                }
            }
        }
        $return = ($sum!=0?round($sum/$nb_surveys):$arrOptions);
        return $return;
    }
}
