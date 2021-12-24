<?php
namespace App\Models;

class CommissionFree extends Commission
{
    public function __construct($commission_type,$amount){
        if ($commission_type == 1){
            $value_of_commission = $amount * 5 /100;
        }
        elseif ($commission_type == 2){
            $value_of_commission = $amount * 8 /100;
        }
        $this->set_value_of_commission($value_of_commission);
    }
}
