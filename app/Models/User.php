<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
        
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

	protected $fillable = [
	   'name', 'mobile','password', 'email', 'otp', 'country', 'city', 'address', 'is_active', 'is_deleted'
	];

	public $timestamps = false;
	
	public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }
    
    public function shipping(){

        return $this->hasOne(UserShipping::class, 'user_id', 'id');
    }
}
