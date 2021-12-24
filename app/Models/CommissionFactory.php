<?php

namespace App\Models;

class CommissionFactory
{
    /**
     * @throws Exception
     */
    public static function calculate_value_of_commission($account_type, $commission_type,$amount){
        switch ($account_type){
            // is free account
            case 1:
                $commission = new CommissionFree($commission_type,$amount);
                return $commission->calculate();
                break;
            //is premium account
            case 2:
                $commission = new CommissionPremium($commission_type,$amount);
                return $commission->calculate();
                break;
            default:
                throw new \Exception('Unexpected value');
        }
    }

}
