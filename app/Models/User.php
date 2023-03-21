<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey='user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'hobbies',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_id',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){
        return $this->hasOne(UserAddress::class,'user_id','user_id');//call the data from the user_addresses table while accesing the user table
    }
    public function orders(){
        return $this->hasMany(Order::class,'user_id','user_id');
    }
    public function setDateOfBirthAttribute($value){
        $this->attributes['date_of_birth'] = date('Y-m-d',strtotime($value));
    }
    public function getDateOfBirthFormatedAttribute(){
        return date('d-M-Y',strtotime($this->date_of_birth));
    }
    protected $appends = ['date_of_birth_formated'];
}
