<?php

namespace Bookkeeper\Users;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Password setter
     *
     * @param string $password
     * @return $this for chaining
     */
    public function setPassword($password)
    {
        $this->attributes['password'] = bcrypt($password);

        return $this;
    }

    /**
     * Static constructor for User
     *
     * @param array $attributes
     * @return static
     */
    public static function create(array $attributes = [])
    {
        $user = new static($attributes);

        $user->setPassword($attributes['password']);

        $user->save();

        return $user;
    }
}
