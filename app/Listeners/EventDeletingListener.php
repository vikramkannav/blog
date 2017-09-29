<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventDeletingCallback;

class EventDeletingListener
{
    public function handle(EventDeletingCallback $event)
    {
        return $event->obj->deleting_event();
    }
}