<?php

namespace App\Components\Queries\GetUserbyUsername;
use App\Components\IQuery;

class GetUserByUsernameQuery implements IQuery
{

    private string $Username;

    public function __construct(string $username)
    {
        $this->Username = $username;
    }

    /**
     * Get the value of Username
     *
     * @return  mixed
     */
    public function getUsername()
    {
        return $this->Username;
    }
}
