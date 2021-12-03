<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;


    protected $table = "transactions";

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
