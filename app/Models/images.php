<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table='imagepath';
    protected $primarykey='id';
    protected $fillable=['img_path'];

    public function productprof()
    {
        return $this->hasMany(productprof::class);
    }
    use HasFactory;
}
