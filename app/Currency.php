<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Currency extends Model
{
    use Notifiable;
    
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'currency_name', 'buy_rate', 'sell_rate',
    ];
}
