<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email = '';
    public $type = '';
    public $id = '';
    public function __construct($user,$type,$id)
    {
        $this->email = $user;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->type){
            case 'forgot':
                return $this->from('contact@in2science.com', 'In2science')
                    ->subject('Forgot Mentor Id')
                    ->markdown('mails.forgot')
                    ->with([
                        'email'=> $this->email,
                    ]);
            case 'mentor':
                return $this->from('contact@in2science.com', 'In2science')
                    ->subject('New Volunteer Registered')
                    ->markdown('mails.mentor')
                    ->with([
                        'email'=> $this->email,
                        'id' => $this->id,
                    ]);
            case 'mentorTime':
                return $this->from('contact@in2science.com', 'In2science')
                    ->subject('Volunteer Availability Received')
                    ->markdown('mails.mentorAvailability')
                    ->with([
                        'id' => $this->id,
                    ]);
            case 'host':
                return $this->from('contact@in2science.com', 'In2science')
                    ->subject('New Record for Host')
                    ->markdown('mails.host')
                    ->with([
                        'email'=> $this->email,
                    ]);
            case 'mentorRequest':
                return $this->from('contact@in2science.com', 'In2science')
                    ->subject('Volunteer Request Received')
                    ->markdown('mails.mentorRequest')
                    ->with([
                        'email'=> $this->email,
                    ]);
            default :
                return $this->from('contact@in2science.com', 'In2science')
                ->subject('Issue in Application')
                ->markdown('mails.issue')
                ->with([
                    'email'=> $this->email,
                ]);
        }

    }
}
