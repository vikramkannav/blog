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
    //
}
