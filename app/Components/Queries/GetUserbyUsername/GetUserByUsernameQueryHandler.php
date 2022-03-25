<?php

namespace App\Components\Queries\GetUserbyUsername;

use App\Models\Utenti;


class GetUserByUsernameQueryHandler  
{

    public static function Retrieve(GetUserByUsernameQuery $query): GetUserByUsernameQueryResult
    {
        $dbresult = Utenti::where('USERNAME', $query->getUsername())->first();
        $result = new GetUserByUsernameQueryResult($dbresult->USERNAME, $dbresult->PASSWORD, $dbresult->ADMIN);
        return $result;
    }
}
