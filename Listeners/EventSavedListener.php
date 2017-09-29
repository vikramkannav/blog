<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventSavedCallback;

class EventSavedListener
{
    public function handle(EventSavedCallback $event)
    {
        return $event->obj->saved_event();
    }
}