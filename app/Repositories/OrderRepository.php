<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository {

	public function store($data)
	{
		return Order::create($data);
	}


	public function findOrderByOrderNumber($order_number)
	{
		$result = Order::where("order_number","=",$order_number)->first();

		return $result;
	}
}