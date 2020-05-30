<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\Prueba;
use Illuminate\Support\Facades\Mail;

/*
*   - Rutan en web.php: Route::get('mail/envia', 'MailController@envia')->name('mail.envia');
*   - Modelo e App\mail.prueba.php. Modelo Mailable
*   - Vista en views que se envía: mails\prueba.blade.php
*/

class MailController extends Controller
{
    public function envia()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to('lavp99@hotmail.com')->send(new Prueba($objDemo));
    }
}