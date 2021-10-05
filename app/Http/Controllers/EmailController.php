<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CustomerJob;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $emailaddress = ["test1@gmail.com", "test2@gmail.com", 'test3@gmail.com'];

        dispatch( new CustomerJob($emailaddress));

        dd("email has been delivered");

    }
}
