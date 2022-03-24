<?php

namespace App\Components\Queries;

use App\Models\LoginModel;


class GetUserByUsernameQueryHandler  
{

    public function Retrieve(GetUserByUsernameQuery $query): GetUserByUsernameQueryResult
    {
        $dbresult = LoginModel::where('USERNAME', $query->Username)->first();
        $result = new GetUserByUsernameQueryResult($dbresult->USERNAME, $dbresult->PASSWORD, $dbresult->ADMIN);
        return $result;
    }
}
