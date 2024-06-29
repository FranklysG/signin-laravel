<?php

namespace App\Services\Notification;

class NotificationService
{

    /**
     * @param  string  $data
     * @return boolean
     */
    public function send()
    {
        try {
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}