<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplierprof extends Model
{

    protected $table = 'supplierprof';
    protected $primaryKey = 'id';
    protected $fillable = [
        'suppliername', 'address', 'contactperson','contactnum'];  

    use HasFactory;
}
