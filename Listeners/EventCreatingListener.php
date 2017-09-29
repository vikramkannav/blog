<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventCreatingCallback;

class EventCreatingListener
{
    public function handle(EventCreatingCallback $event)
    {
        return $event->obj->creating_event();
    }
}