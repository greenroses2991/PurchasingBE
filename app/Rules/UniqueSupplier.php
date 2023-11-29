<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\supplierprof;

class UniqueSupplier implements ValidationRule

{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail):void
    {
       
        //
        // [$suppliername, $address, $contactperson,$contactnum] = explode(' ', $value);

        $count = supplierprof::where('suppliername', $value)->count();
            // ->where('address', $address)
            // ->where('contactperson', $contactperson)
            // ->where('contactnum', $contactperson)
            // ->count();

           if($count > 0) {

            // echo $count;
                $fail('The suppliername is existing.');

                
            }

        // return $count === 0;
    }
    
}
