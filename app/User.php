<?php namespace Course;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'first_name', 'email', 'password', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function profile() //establcemos la relacion mediante este metodo
	{
		return $this->hasOne('Course\UserProfile');
	}

	public function getFullNameAttribute()
	{
		return $this->first_name.' '.$this->last_name;
	}

	public function setPasswordAttibure($value)
	{
		if (! empty($value)) 
		{
			$this->attributes['password'] = bcrypt($value);
		}
	}

	public function scopeName($query, $name)
	{
		// dd("scope: ".$name);
		if (trim($name) != "" ) {
			$query->where('full_name', "LIKE", "%$name%");
		}
	}

	public function scopeType($query, $type)
    {
        $types = config('options.types');
        if ($type != "" && isset($types[$type]))
        {
            $query->where('type', $type);
        }
    }

    public function isAdmin()
    {
    	return $this->type === 'admin';
    }

}
