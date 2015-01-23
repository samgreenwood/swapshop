<?php namespace Swapshop;

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Ardent implements UserInterface, RemindableInterface {

    protected $fillable = array('id', 'username', 'firstname', 'surname', 'email', 'signature');

    public static $rules = array();

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'swapshop_users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the remmeber token.
     *
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the remember token
     *
     * @param string $value
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function listings()
    {
        return $this->hasMany('Swapshop\Listing');
    }

    public function purchases()
    {
        return $this->hasMany('Swapshop\Purchase');
    }

    public function sales()
    {
        return $this->hasManyThrough('Swapshop\Sale', 'Swapshop\Listing', 'user_id', 'listing_id');
    }

    public function isAdmin()
    {
        return $this->role == "admin";
    }

    public function __toString()
    {
        return $this->username;
    }

}
