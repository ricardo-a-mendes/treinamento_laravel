<?php

namespace CodeCommerce\Events;

use CodeCommerce\Events\Event;
use CodeCommerce\Order;
use CodeCommerce\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckoutEvent extends Event
{
    use SerializesModels;

	/**
	 * @var User
	 */
	private $user;
	/**
	 * @var Order
	 */
	private $order;

	/**
     * Create a new event instance.
	 *
	 * @param $user User
	 * @param $order Order
     *
     * @return void
     */
    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
		$this->order = $order;
	}

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return Order
	 */
	public function getOrder() {
		return $this->order;
	}

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
