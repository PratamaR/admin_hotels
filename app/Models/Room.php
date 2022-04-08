<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['no_room', 'id_froome', 'id_gallery', 'person', 'price', 'status'];

    public function froome()
    {
        return $this->belongsTo(Froome::class, 'id_froome', 'id');
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'id_gallery', 'id');
    }


    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'id_type');
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return '<h5><span class="badge badge-warning">Deactive</span></h5>';
        } else {
            return '<h5><span class="badge badge-success">Aktif</span></h5>';
        }
    }
}
