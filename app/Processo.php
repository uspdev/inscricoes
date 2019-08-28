<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Processo extends Model
{
    use LogsActivity;

    protected $fillable = ['status', 'updated_at'];
    
    protected static $logAttributes = ['status', 'updated_at'];
}
