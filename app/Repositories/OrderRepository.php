<?php

namespace App\Repositories;

use App\Model\Order;

class OrderRepository {

	public function store($data)
	{
		return Order::create($data);
	}


	public function findOrderByTransId($transaction_id)
	{
		$result = Order::find(transaction_id);

		return $result
	}
}