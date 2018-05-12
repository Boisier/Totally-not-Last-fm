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
    'user_id_user', 'user_mail', 'user_username', 'user_birthday'
  ];
  protected $hidden = ['updated_at','created_at','user_password',];

  /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

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
