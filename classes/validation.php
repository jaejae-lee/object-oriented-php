<?php

class Validator
{
    // private $email; // not storing this value so dont need property here 
    // private $postcode;

    public function email($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $boolresult = true;
        }else{
            $boolresult = false;
        }
        return $boolresult;
    }

    public function postcode($postcode)
    {
        $regcode = '/^[A-Z][A-Z]?[0-9][0-9]?[0-9A-Z]? [0-9][A-Z][A-Z]$/';
        $validated = preg_match($regcode, '{$postcode}');

        var_dump($validated);

        if ($validated > 0) {
            $boolresult = true;
        }else{
            $boolresult = false;
        }
        return  $boolresult; 
    }

}

$validator = new Validator();

// it validates email addresses
echo "Email\n";
var_dump($validator->email("alfonso@example.com")); // bool(true)
var_dump($validator->email("wombat+12@spoons.plumbing")); // bool(true)
var_dump($validator->email("blah blah blah! alfonso@example.com")); // bool(false)
var_dump($validator->email("wombat@spoonsplumbing")); // bool(false)
var_dump($validator->email("wombatspoons")); // bool(false)
var_dump($validator->email("@wombatspoons")); // bool(false)

// it validates postcodes
echo "\nPostcode\n";
var_dump($validator->postcode("BS4 3UH")); // bool(true)
var_dump($validator->postcode("S10 4GR")); // bool(true)
var_dump($validator->postcode("BS14 9DI")); // bool(true)
var_dump($validator->postcode("SW1A 1AA")); // bool(true)
var_dump($validator->postcode("12B DI9")); // bool(false)
var_dump($validator->postcode("EST4 DD29")); // bool(false)
var_dump($validator->postcode("blah blah BS5 8RJ blah blah")); // bool(false)