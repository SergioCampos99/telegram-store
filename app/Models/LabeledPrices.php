<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabeledPrices extends Model
{
    protected $fillable = [
        'label', 'amount'
    ];
    
}
