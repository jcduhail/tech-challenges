<?php

namespace Client\Webapp\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SurveysController
{

    protected $surveyService;

    public function __construct($service)
    {
        $this->surveyService = $service;
    }

    public function getSurvey($type,$code){
        return new JsonResponse($this->surveyService->getSurvey($type,$code));
    }

    public function getDataFromRequest(Request $request)
    {
        return $survey = array(
            "survey" => $request->request->get("survey")
        );
    }
}
