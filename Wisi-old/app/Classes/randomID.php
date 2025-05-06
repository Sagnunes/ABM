<?php
/**
 * Created by PhpStorm.
 * User: Nunes
 * Date: 27/02/2018
 * Time: 19:39
 */

namespace App\Classes;


class randomID
{
    public function generateID(){
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $uppercase =strtoupper($lowercase);
        $characters = $lowercase.$numbers.$uppercase;
        $string = '';
        $random_string_length =8;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }
}