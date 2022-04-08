<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    use HasFactory;

    public function fhotel()
    {
        return $this->belongsTo('App\Models\Fhotel');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function froome()
    {
        return $this->belongsTo('App\Models\Froome');
    }

    public function testimoni()
    {
        return $this->belongsTo('App\Models\Testimoni');
    }

    public function setting()
    {
        return $this->belongsTo('App\Models\Setting');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
