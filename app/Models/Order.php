<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";

    public function items()
    {
        return $this->hasMany(Transactions::class);
    }

    public function getStatusLabel()
    {
        if ($this->status == 0) {
            return '<span class="badge bg-warning">Kutilmoqda</span>';
        }

        if ($this->status == 1) {
            return '<span class="badge bg-success">Bajarildi</span>';
        }
    }

    public function getTotalAmount()
    {

        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->price * $item->quantity;
        }

        return $sum;

    }
}
