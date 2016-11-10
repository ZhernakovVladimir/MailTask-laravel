<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.11.2016
 * Time: 10:35
 */

namespace App\Components;


use App\Mailtask;

class MailTaskProcessor
{
    public static function run()
    {
       $mail =  Mailtask::untouched()->first();
        if ($mail) {
            $mail->TouchMessage();
            
            while($mail =  Mailtask::touched()->first()) {$mail->send();}
        }
        
    }
}