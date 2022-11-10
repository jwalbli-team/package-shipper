<?php

declare(strict_types=1);

namespace Semai\Shipper\Repositories;

use Semai\Shipper\{ShipperConfig, Requestor};

/** @package Semai\Shipper\Repositories */
class ShipperRepository
{
	/** @return string  */
	protected function baseUrl()
	{
		return ShipperConfig::$isTest ? 'https://merchant-api-sandbox.shipper.id' : 'https://merchant-api.shipper.id';
	}

	/** @return string  */
	protected function baseUrlV1()
	{
		return ShipperConfig::$isTest ? 'https://api.sandbox.shipper.id' : 'https://api.shipper.id/prod';
	}

	public function countries(array $params = [])
	{
		$endpoint = $this->baseUrl().'/v3/location/countries';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function provinces(int $countryId, array $params = [])
	{
		$endpoint = $this->baseUrl().'/v3/location/country/'.$countryId.'/provinces';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function cities(int $provinceId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/location/province/'.$provinceId.'/cities';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function suburbs(int $cityId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/location/city/'.$cityId.'/suburbs';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function areas(int $suburbId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/location/suburb/'.$suburbId.'/areas';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}


	public function search(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/location';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function logistics(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/logistic';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function domesticRates(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/pricing/domestic/';

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'POST', $payload);

		return $result;
	}

	public function intlRates(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/pricing/international';

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'POST', $payload);

		return $result;
	}

	public function createDomesticOrder(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/order';

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'POST', $payload);

		return $result;
	}

	public function orderDetail($orderId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/order/'.$orderId;

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function orderTrackingStatus(string $statusId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/order/status/'.$statusId;

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function orderByParam(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/order';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function updateOrder(string $orderId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/order/'.$orderId;

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'PUT', $payload);

		return $result;
	}

	public function cancelOrder(string $orderId, array $params)
	{
		$endpoint = $this->baseUrl().'/v3/order/'.$orderId;

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'DELETE', $payload);

		return $result;
	}

	public function pickupTimeslot(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/pickup/timeslot';

		$payload = [
			'query' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'GET', $payload);

		return $result;
	}

	public function createPickupWithTimeslot(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/pickup/timeslot';

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'POST', $payload);

		return $result;
	}

	public function cancelPickup(array $params)
	{
		$endpoint = $this->baseUrl().'/v3/pickup/cancel';

		$payload = [
			'json' => $params
		];

		$result = (new Requestor)->fetchData($endpoint, 'PATCH', $payload);

		return $result;
	}

	public function agents(int $suburbId)
	{
		$endpoint = $this->baseUrlV1().'/public/v1/agents';
		$payload = [
			'query' => [
				'apiKey' => ShipperConfig::$api,
				'suburbId' => $suburbId
			]
		];

		$result = (new Requestor)->fetchDataV1($endpoint, 'GET', $payload);

		return $result;
	}
}
