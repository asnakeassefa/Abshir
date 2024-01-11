<?php

declare(strict_types=1);

use Firebase\JWT\JWT;

require_once('../vendor/autoload.php');


function val_jwt($jwt){


    try {

        $secretKey  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';
        JWT::$leeway += 60;
        $token = JWT::decode((string)$jwt, $secretKey, ['HS512']);
        $now = new DateTimeImmutable();
        $serverName = "your.domain.name";
        
        if ($token->iss !== $serverName ||
            $token->nbf > $now->getTimestamp() ||
            $token->exp < $now->getTimestamp())
        {
        return FALSE;
        }
        else{
            return TRUE;
        }

    } catch (\Throwable $th) {
        return FALSE;
 
    }

}





// Show the page
