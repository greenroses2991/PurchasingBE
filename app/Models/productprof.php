<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productprof extends Model
{
    protected $table = 'productprof';
    protected $primaryKey = 'id';
    protected $fillable = ['productname', 'desc', 'unitid','brandid','imagepathid'];  
 

public function images()
{
    return $this->belongsTo(images::class);
}

public function brands()
{
    return $this->belongsTo(brands::class);
}

public function units()
{
    return $this->belongsTo(units::class);
}
    use HasFactory;
}
