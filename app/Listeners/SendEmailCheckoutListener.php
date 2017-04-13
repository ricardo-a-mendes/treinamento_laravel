<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
		$user = $event->getUser();
		$order = $event->getOrder();

		Mail::send('emails.order_confirmation', compact('user', 'order'), function ($mail) use ($user){
			$mail->from('orders@commerce.com', 'Order Commerce');
			$mail->to($user->email, $user->name);
			$mail->subject('Sua ordem foi finalizada com sucesso');
		});
    }
}
