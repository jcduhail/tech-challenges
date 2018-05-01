<?php
namespace Client\Webapp\Tests;

use Silex\WebTestCase;

define('ROOT_PATH', realpath('.'));

class AppTest extends WebTestCase
{
    public function createApplication()
    {
        return require ROOT_PATH . '/src/app.php';
    }

    public function testApiRoot()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $response = $client->getResponse();

        $this->assertTrue($response->isOk());
        $this->assertEquals('Status OK', $response->getContent());
    }
    
    public function testSurvey1(){
        $client = $this->createClient();
        $crawler = $client->request('GET', '/api/v1/surveys/qcm/XX1');
        $response = $client->getResponse();
        
        $this->assertTrue($response->isOk());
        $this->assertEquals('Response', $response->getContent());
    }
    
    public function testSurvey2(){
        $client = $this->createClient();
        $crawler = $client->request('GET', '/api/v1/surveys/qcm/XX2');
        $response = $client->getResponse();
        
        $this->assertTrue($response->isOk());
        $this->assertEquals('Response', $response->getContent());
    }

    public function testSurvey3(){
        $client = $this->createClient();
        $crawler = $client->request('GET', '/api/v1/surveys/qcm/XX3');
        $response = $client->getResponse();
        
        $this->assertTrue($response->isOk());
        $this->assertEquals('Response', $response->getContent());
    }
    
    public function testSurvey4(){
        $client = $this->createClient();
        $crawler = $client->request('GET', '/api/v1/numeric/XX1');
        $response = $client->getResponse();
        
        $this->assertTrue($response->isOk());
        $this->assertEquals('Response', $response->getContent());
    }
    
    public function testSurvey5(){
        $client = $this->createClient();
        $crawler = $client->request('GET', '/api/v1/surveys/numeric/XX2');
        $response = $client->getResponse();
        
        $this->assertTrue($response->isOk());
        $this->assertEquals('Response', $response->getContent());
    }
    
    public function testSurvey6(){
        $client = $this->createClient();
        $crawler = $client->request('GET', '/api/v1/surveys/numeric/XX3');
        $response = $client->getResponse();
        
        $this->assertTrue($response->isOk());
        $this->assertEquals('Response', $response->getContent());
    }
    
    
}
