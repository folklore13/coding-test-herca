<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestTrx = self::latest('id')->first();
            $nextId = $latestTrx ? $latestTrx->id + 1 : 1;
            $model->transaction_number = 'TRX' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });

        static::saving(function ($model) {
            $model->grand_total = $model->cargo_fee + $model->total_balance;
        });
    }
}
