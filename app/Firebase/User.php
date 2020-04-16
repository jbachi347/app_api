<?php

namespace App\Firebase;

use Illuminate\Contracts\Auth\Authenticatable;

class User implements Authenticatable
{
    /**
     * The claims decoded from the JWT token.
     *
     * @var array
     */
    private $claims;

    /**
     * Creates a new authenticatable user from Firebase.
     */
    public function __construct($claims)
    {
        $this->claims = $claims;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'sub';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return (string) $this->claims['sub'];
    }

    public function getData()
    {
        $arr['iss'] = $this->claims['iss'];
        $arr['aud'] = $this->claims['aud'];
        $arr['auth_time'] = $this->claims['auth_time'];
        $arr['user_id'] = $this->claims['user_id'];
        $arr['sub'] = $this->claims['sub'];
        $arr['iat'] = $this->claims['iat'];
        $arr['exp'] = $this->claims['exp'];
        $arr['email'] = $this->claims['email'];
        $arr['email_verified'] = $this->claims['email_verified'];
        $arr['firebase'] = $this->claims['firebase'];

        return $arr;
    }
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        throw new \Exception('No password for Firebase User');
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        throw new \Exception('No remember token for Firebase User');
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        throw new \Exception('No remember token for Firebase User');
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        throw new \Exception('No remember token for Firebase User');
    }
}