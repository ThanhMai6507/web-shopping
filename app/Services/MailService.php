<?php

namespace App\Services;

use App\Mail\CheckoutCartMail;
use Illuminate\Support\Facades\Mail;

class MailService 
{
    public function sendMailCheckoutCart($user, $listCart)
    {
        return Mail::to($user)->send(new CheckoutCartMail($listCart));
    }
}