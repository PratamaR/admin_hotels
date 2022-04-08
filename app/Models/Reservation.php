<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'id_type', 'id_room', 'date_checkin', 'date_checkout', 'guest', 'guest_name', 'no_ktp', 'status' ];
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'id_type');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'id_room');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return '<h5><span class="badge badge-warning">Pending</span></h5>';
        } elseif ($this->status == 1) {
            return '<h5><span class="badge badge-success">Checkin</span></h5>';
        } else {
            return '<h5><span class="badge badge-danger">Checkout</span></h5>';
        }
    }
}
