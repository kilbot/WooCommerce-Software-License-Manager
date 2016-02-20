<?php

namespace WC_SLM\Integration\Test;

use \GuzzleHttp\Client;

class API extends \PHPUnit_Framework_TestCase {

  public $client;

  public function setUp () {
    $this->client = new Client();
  }

  public function test_get_valid_response() {
    $response = $this->client->get( \WC_SLM\API::get_api_url() );
    $this->assertEquals(200, $response->getStatusCode());
  }

}