<?php

namespace App;

use App\Traits\NotificationsTrait;
use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EventCallbackTrait;
use App\Events\EventCreatingCallback;
use App\Events\EventCreatedCallback;
use App\Events\EventSavingCallback;
use App\Events\EventSavedCallback;
use App\Events\EventUpdatingCallback;
use App\Events\EventUpdatedCallback;
use App\Events\EventDeletingCallback;
use App\Events\EventDeletedCallback;
use App\Events\EventRestoringCallback;
use App\Events\EventRestoredCallback;
use Webpatser\Uuid\Uuid;
use App\Traits\ObjectJsonBuilder;
use Log;


class BaseModel extends Model
{
    use ValidationTrait, EventCallbackTrait, ObjectJsonBuilder;

    protected $dispatchesEvents = [
        'creating' => EventCreatingCallback::class,
        'created' => EventCreatedCallback::class,
        'updating' => EventUpdatingCallback::class,
        'updated' => EventUpdatedCallback::class,
        'saving' => EventSavingCallback::class,
        'saved' => EventSavedCallback::class,
        'deleting' => EventDeletingCallback::class,
        'deleted' => EventDeletedCallback::class,
        'restoring' => EventRestoringCallback::class,
        'restored' => EventRestoredCallback::class,
    ];

    // set the uuid to every record save.
    public function creating_event()
    {

        if (!$this->get_skip_validation()) {
            return $this->validateObject();
        }
        return true;
    }

    // set the uuid to every record save.
    public function updating_event()
    {
        if (!$this->get_skip_validation()) {
            return $this->validateObject();
        }
        return true;
    }
    public function saving_event()
    {
        if (!$this->get_skip_validation())
        {
            return $this->validateObject();
        }

        return true;
    }

}
