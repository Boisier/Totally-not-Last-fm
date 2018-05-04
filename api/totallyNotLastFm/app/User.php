<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * An history can have one user
     */
    public function history(){
        return $this->hasOne('App/History.php');
    }

    /**
     * A user can have one spotify
     */
    public function spotify(){
        return $this->hasOne('App/Spotify.php');
    }

    /**
     * A user can have many playlist
     */
    public function playlist(){
        return $this->hasMany('App/Playlist.php');
    }
}
