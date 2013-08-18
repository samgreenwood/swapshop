<?php namespace Swapshop;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {
	
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
		$this->attributes['password'] = Hash::make($value);
	}

	public function hasRole($role)
	{
		return in_array($this->roles, $role);
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
		return $this->hasMany('Swapshop\Sale');
	}

	public function __toString()
	{
		return $this->username;
	}

}