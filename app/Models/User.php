<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{

    use Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'first_name','last_name', 'email', 'password','image','salary','manager_id','department_id','type'
    ];

    protected $with =['department','manager'];
    protected $appends =['full_name'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function manager(){
        return $this->belongsTo(User::class,'manager_id');
    }

    public function employees(){
        return $this->hasMany(User::class,'manager_id');
    }
    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}
