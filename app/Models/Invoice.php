<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
       "url", "chat_id", "title", "description", "payload", "provider_token", "currency", "prices"
    ];
}
