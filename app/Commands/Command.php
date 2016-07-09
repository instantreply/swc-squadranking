<?php
namespace App\Commands;

abstract class Command
{
    public $action;
    public $args;
    public $requestId;
    public $time = 0;
    public $token;

    /**
     * Command constructor.
     */
    public function __construct()
    {
        $this->token = static::generateToken();
    }

    public function handleResponse($responseData)
    {
    }

    public static function generateToken()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}
