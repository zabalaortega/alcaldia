<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail(){
        
        dispatch(new SendEmailJob());
        echo 'mensaje enviado';
    }
    
}
