<?php

namespace App\Components;
//Simple result class for command handlers to return 
class CommandResult
{
    private bool $Success;

    private string $Message;

    public function __construct(bool $success, string $message)
    {
        $this->Success = $success ?? false;
        $this->Message = $message ?? "No Message";
    }

    /**
     * Get the value of Success
     *
     * @return  mixed
     */
    public function getSuccess()
    {
        return $this->Success;
    }


    /**
     * Get the value of Message
     *
     * @return  mixed
     */
    public function getMessage()
    {
        return $this->Message;
    }
}
