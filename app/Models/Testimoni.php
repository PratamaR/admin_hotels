<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id');
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class, 'id_setting', 'id');
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'id_gallery', 'id');
    }

    public function froome()
    {
        return $this->belongsTo(Froome::class, 'id_froome', 'id');
    }

    public function fhotel()
    {
        return $this->belongsTo(Fhotel::class, 'id_fhotel', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room', 'id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_reservation', 'id');
    }
}
