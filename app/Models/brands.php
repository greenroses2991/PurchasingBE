<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table='brand';
    protected $primarykey='id';
    protected $guarded=[];
    

    public function productprof()
    {
        return $this->hasMany(productprof::class);
    }
    use HasFactory;
}
