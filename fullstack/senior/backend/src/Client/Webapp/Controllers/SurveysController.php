<?php

namespace Client\Webapp\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Client\Webapp\Services\SurveysService;


class SurveysController
{

    protected $surveyService;

    /**
     * 
     * @param SurveysService $service
     */    
    public function __construct(SurveysService $service)
    {
        $this->surveyService = $service;
    }

    /**
     * 
     * @param String $type
     * @param String $code
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getSurvey(String $type,String $code){
        return new JsonResponse($this->surveyService->getSurvey($type,$code));
    }
}
