<?php

namespace App\Jobs;

use App\Repositories\UserRepository;
use App\Services\Notification\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The podcast instance.
     *
     * @var \App\Repository\UserRepository
     */

    public $user;


    /**
     * Create a new job instance.
     *
     * @param App\Models\User $user
     * @param string $title
     * @param string $message
     * 
     * @return void
     */
    public function __construct($user)
    {
        $this->onQueue('notification');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = (new UserRepository())->getUserByEmail($this->user->email);          
        $email = $user->email;
        $notification = new NotificationService();
        $notification->send($email);
    }
}