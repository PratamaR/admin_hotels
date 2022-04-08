<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'id_type', 'description', 'status', 'picture'];
    protected $guarded = ['id'];

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
