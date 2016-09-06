<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class SendEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    protected $name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$name)
    {
        $this->user = $user;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
    	$mailer->send('mail.mail', ['user' => $this->user], function ($m){
    		$m->to($this->user, $this->name)->subject('发送成功');
    	});
    		 
    }
}
