<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    private $value_of_commission;

    protected $fillable = [
        'order_id', 'user_id', 'value_of_commission',
    ];

    public function set_value_of_commission($commission_percent){
        $this->value_of_commission = $commission_percent;
    }
    public function get_value_of_commission()
    {
        return $this->value_of_commission;

    }


    public function calculate(){
        return $this->get_value_of_commission();
    }

    public static function rules()
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'value_of_commission' => 'required',
        ];
    }

    public static function messages(){
        return [
            'order_id.required' => 'Commission must have a order',
            'order_id.exists'   => 'Commission must have a order',

            'user_id.required' => 'Commission must have a user',
            'user_id.exists'   => 'Commission must have a user',

            'value_of_commission' => 'Commission must have a value of commission'
        ];
    }

    /*
     * relation between Commission and user
     * get owner of the commission
     * */
    public function ownerOfCommission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id');
    }

}
