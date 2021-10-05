<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class CustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $sendto = [];


    public function __construct($address)
    {
        $this->sendto = $address;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        foreach ($this->sendto as $key => $value) {
            Mail::to($value)->send(new SendMailable());
        }
    }
}
