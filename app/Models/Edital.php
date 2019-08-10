<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    public function inscricao() {
        return $this->belongsTo('App\Models\Inscricao');
    }
}
