<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventUpdatingCallback;

class EventUpdatingListener
{
    public function handle(EventUpdatingCallback $event)
    {
        return $event->obj->updating_event();
    }
}