<?php


namespace WardBuilding\Models;

use Illuminate\Auth\Reminders\RemindableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Member extends BaseModel implements \Illuminate\Auth\UserInterface{
  protected $table = 'member';
  protected $primaryKey = 'id';
  protected $guarded = array('id');
  protected $hidden = array('password');

  public function requests() {
    return $this->hasMany('WardBuilding\Models\Request');
  }

  public function ward() {
    return $this->belongsTo('WardBuilding\Models\Ward');
  }

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

  public function getRememberToken()
  {
    return $this->remember_token;
  }

  public function setRememberToken($value)
  {
    $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
    return 'remember_token';
  }


} 