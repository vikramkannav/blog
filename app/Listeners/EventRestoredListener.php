<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventRestoredCallback;

class EventRestoredListener
{
    public function handle(EventRestoredCallback $event)
    {
        return $event->obj->restored_event();
    }
}