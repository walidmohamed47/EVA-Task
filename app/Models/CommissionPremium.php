<?php
namespace App\Models;

class CommissionPremium extends Commission
{
    public function __construct($commission_type,$amount){
        if ($commission_type == 1){
            $value_of_commission = $amount * 10 /100;
        }
        elseif ($commission_type == 2){
            $value_of_commission = $amount * 20 /100;
        }
        $this->set_value_of_commission($value_of_commission);
    }
}
