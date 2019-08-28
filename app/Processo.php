<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Processo extends Model
{
    use LogsActivity;

    protected $fillable = ['updated_at'];
    
    protected static $logAttributes = ['updated_at'];
}
