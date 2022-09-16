<?php

declare(strict_types=1);

namespace Semai\Shipper;

use Semai\Shipper\Repositories\ShipperRepository;

/** @package Semai\Shipper */
class ShipperApi
{
    public function countries(array $params)
    {
        return (new ShipperRepository)->countries($params);
    }

    public function provinces(int $countryId, array $params)
    {
        return (new ShipperRepository)->provinces($countryId, $params);
    }

    public function cities(int $provinceId, array $params)
    {
        return (new ShipperRepository)->cities($provinceId, $params);
    }

    public function suburbs(int $cityId, array $params)
    {
        return (new ShipperRepository)->suburbs($cityId, $params);
    }

    public function areas(int $suburbId, array $params)
    {
        return (new ShipperRepository)->areas($suburbId, $params);
    }


    public function search(array $params)
    {
        return (new ShipperRepository)->search($params);
    }

    public function logistics(array $params)
    {
        return (new ShipperRepository)->logistics($params);
    }

    public function domesticRates(array $params)
    {
        return (new ShipperRepository)->domesticRates($params);
    }

    public function intlRates(array $params)
    {
        return (new ShipperRepository)->intlRates($params);
    }

    public function createDomesticOrder(array $params)
    {
        return (new ShipperRepository)->createDomesticOrder($params);
    }

    public function orderDetail(string $orderId, array $params)
    {
        return (new ShipperRepository)->orderDetail($orderId, $params);
    }

    public function orderTrackingStatus(string $statusId, array $params)
    {
        return (new ShipperRepository)->orderTrackingStatus($statusId, $params);
    }

    public function orderByParam(array $params)
    {
        return (new ShipperRepository)->orderByParam($params);
    }

    public function updateOrder(string $orderId, array $params)
    {
        return (new ShipperRepository)->updateOrder($orderId, $params);
    }

    public function cancelOrder(string $orderId, array $params)
    {
        return (new ShipperRepository)->cancelOrder($orderId, $params);
    }

    public function pickupTimeslot(array $params)
    {
        return (new ShipperRepository)->pickupTimeslot($params);
    }

    public function createPickupWithTimeslot(array $params)
    {
        return (new ShipperRepository)->createPickupWithTimeslot($params);
    }

    public function cancelPickup(array $params)
    {
        return (new ShipperRepository)->cancelPickup($params);
    }

    public function agents(int $suburbId)
    {
        return (new ShipperRepository)->agents($suburbId);
    }
}
