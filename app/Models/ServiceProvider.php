<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public  function gallary() {
        return $this->belongsTo(Gallary::class);
    }
}
