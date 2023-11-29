<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueBrand implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        [$id, $prodbrand] = explode(' ', $value);

        $count = User::where('id', $id)
            ->where('prodbrand', $prodbrand)
            ->count();

        return $count === 0;
    }
    public function message()
    {
        return 'The combination of ID and Brand name already exists.';
    }
}
