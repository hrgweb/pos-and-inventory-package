<?php

namespace Hrgweb\PosAndInventory\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionSession extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
