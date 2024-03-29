<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\SocialProfile;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    public function authorizeRole($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, 'La acción no está autorizada');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }

        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
         if($this->roles()->where('name',$role)->first()){
            return true;
         }
         return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion uno a muchos

    public function socialProfiles(){
        return $this->hasMany(SocialProfile::class);
    }
}
