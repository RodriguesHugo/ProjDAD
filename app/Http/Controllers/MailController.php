<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $objMail = new \stdClass();
        $objMail->usename = 'Demo One Value';
        $objMail->password = 'Demo Two Value';
        $objMail->sender = 'projdad.2018@gmail.com';
        $objMail->receiver = 'ReceiverUserName';
 
        Mail::to()->send(new ConfirmEmail($objMail));
    }
}