<?php

namespace App\Components\Queries;

use App\Components\IQueryResult;

class GetUserByUsernameQueryResult implements IQueryResult
{

    private string $Username;
    private string $Password;
    private bool $Admin;

    public function __construct(string $username, string $password, bool $admin)
    {
        $this->Username = $username;
        $this->Password = $password;
        $this->Admin = $admin ?? false;
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


    /**
     * Get the value of Password
     *
     * @return  mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Get the value of Admin
     *
     * @return  mixed
     */
    public function getAdmin()
    {
        return $this->Admin;
    }
}
