<?php

namespace App\Models;

use App\Enums\RentalStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'rental_uid',
        'total_cost',
        'start_date',
        'end_date',
        'status',
    ];
    protected $dates = ['start_date', 'end_date'];

    protected $casts = [
        'status' => RentalStatusEnum::class,
    ];

    protected static function boot() {
        parent::boot();
        static::creating(function ($rental) {
            $rental->rental_uid = self::generateUID();
            $rental->user_id = auth()->id();
        });
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function generateUID()
    {
        $currentYM = now()->format('ym');
        do {
            $lastUID = self::where('rental_uid', 'like', 'DT' . $currentYM . 'RS%')->latest('id')->first();
            $number = $lastUID ? intval(substr($lastUID->rental_uid, -4)) + 1 : 1;
            $newUID = 'DT' . $currentYM . 'RS' . str_pad($number, 4, '0', STR_PAD_LEFT);
        } while (self::where('rental_uid', $newUID)->exists());

        return $newUID;
    }

}
