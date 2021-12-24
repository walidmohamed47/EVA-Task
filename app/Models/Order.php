<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'amount',
    ];

    public static function rules()
    {
        return [
            'amount' => 'required',
        ];
    }

    public static function messages(){
        return [
            'amount' => 'Order must have a amount'
        ];
    }

    /*
     * relation between order and user
     * get owner of the order
     * */
    public function ownerOfOrder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
