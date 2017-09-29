<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventRestoringCallback;

class EventRestoringListener
{
    public function handle(EventRestoringListener $event)
    {
        return $event->obj->restored_event();
    }
}