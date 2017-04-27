<?php

namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\Admin\AdminRequest;
use CodeCommerce\Order;
use CodeCommerce\Repositories\OrderRepository;
use CodeCommerce\Repositories\StatusRepository;
use CodeCommerce\Status;
use Validator;

class AdminController extends Controller
{

	/**
	 * @var Order
	 */
	private $order;
	/**
	 * @var Status
	 */
	private $status;

	public function __construct(OrderRepository $order, StatusRepository $status) {
		$this->order = $order;
		$this->status = $status;
	}

	public function index() {
		return view('admin.index');
    }

    public function listOrders() {
		$orders = $this->order->all();
		$statuses = $this->status->pluck('description', 'id');
		return view('admin.orders.index', compact('orders', 'statuses'));
	}

	public function changeStatus($orderID, $statusID) {

		$validator = Validator::make(compact('orderID', 'statusID'), [
			'orderID' => 'required|numeric|exists:orders,id',
			'statusID' => 'required|numeric|exists:statuses,id',
		]);

		if ($validator->fails()) {
			return redirect()->route('admin.orders.index')
				->withErrors($validator);
		}

		$order = $this->order->find($orderID);
		$order->status_id = $statusID;
		$order->save();

		//TODO: Create a session to display "Update Successful"
		return redirect()->route('admin.orders.index');
	}
}
