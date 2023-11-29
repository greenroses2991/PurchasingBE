<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class units extends Model
{

    protected $table = 'unit';
    protected $primaryKey = 'id';
    protected $fillable = ['produnit'];  
 
    public function productprof()
    {
        return $this->hasMany(productprof::class);
    }
    use HasFactory;
}
