<?php

declare(strict_types=1);

namespace Semai\Shipper;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use stdClass;

/** @package Semai\Shipper */
class Requestor
{
	/**
	 * @param string $endpoint 
	 * @param string $verb 
	 * @param array $payload 
	 * @return object 
	 */
	public function fetchData(string $endpoint, string $verb, array $payload = [])
	{
		$container = [];

		$history = Middleware::history($container);

		$handlerStack = HandlerStack::create();

		$handlerStack->push($history);

		$client = new Client(['http_errors' => false, 'handler' => $handlerStack, 'headers' => ['User-Agent' => 'Shipper/', 'X-API-Key' => ShipperConfig::$api]]);

		$res = $client->request($verb, $endpoint, $payload);

		// DEBUG
		/*
		foreach ($container as $transaction) {
			error_log(print_r((string)$transaction['request']->getBody(), TRUE), 3, "./error.log");
		}
		*/

		$httpStatusCode = $res->getStatusCode();

		$data = (string) $res->getBody();
		$data = json_decode($data);

		$object = new stdClass();
		$object->{"http_status_code"} = $httpStatusCode;
		$object->{"results"} = $data;

		return $object;
	}

	/**
	 * @param string $endpoint 
	 * @param string $verb 
	 * @param array $payload 
	 * @return object 
	 */
	public function fetchDataV1(string $endpoint, string $verb, array $payload = [])
	{
		$container = [];

		$history = Middleware::history($container);

		$handlerStack = HandlerStack::create();

		$handlerStack->push($history);

		$client = new Client(['http_errors' => false, 'handler' => $handlerStack, 'headers' => ['User-Agent' => 'Shipper/']]);

		$res = $client->request($verb, $endpoint, $payload);

		// DEBUG
		/*
		foreach ($container as $transaction) {
			error_log(print_r((string)$transaction['request']->getBody(), TRUE), 3, "./error.log");
		}
		*/

		$httpStatusCode = $res->getStatusCode();

		$data = (string) $res->getBody();
		$data = json_decode($data);

		$object = new stdClass();
		$object->{"http_status_code"} = $httpStatusCode;
		$object->{"results"} = $data;

		return $object;
	}
}
