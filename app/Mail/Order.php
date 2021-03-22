<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Cart;
use Illuminate\Support\Facades\DB;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = Cart::getContent()->sort();
        $total = Cart::getTotal();
        $count=Cart::getContent()->count();
       

        $customer=request()->session()->get('people');
        return $this->from($customer['email']) // L'expéditeur
                    ->subject("Commande ") // Le sujet
                    ->view('cart/orderCart', compact('content', 'total', 'count')); // La vue
    }
}