<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestHistory extends Model
{
    /** @use HasFactory<\Database\Factories\RequestHistoryFactory> */
    use HasFactory;
    public $timestamps = false;
}
