<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Prueba extends Mailable
{
    use Queueable, SerializesModels;



    public $demo;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('lavp99@hotmail.com.com')
                    ->view('mails.prueba')
                    ->with(['testVarOne' => '1',
                            'testVarTwo' => '2'
                           ])
                    //->attach(public_path('/images').'/demo.jpg', ['as' => 'demo.jpg',
                    //                                              'mime' => 'image/jpeg',
                    //                                              ])
                    ;

        //return $this->view('mails.prueba');
    }
}
