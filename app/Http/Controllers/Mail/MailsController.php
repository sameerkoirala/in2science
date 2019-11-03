<?php


namespace App\Http\Controllers\Mail;


use App\Http\Controllers\Controller;
use App\Mail\SendMailNotification;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
{
    public function sendMail($type,$email,$id){

        Mail::to("admin@in2science.com")->send(new SendMailNotification($email,$type,$id));

        return json_decode(json_encode(["success"=> true]),true);

    }
}
