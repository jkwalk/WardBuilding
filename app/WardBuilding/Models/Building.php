<?php

namespace WardBuilding\Models;

class Building extends BaseModel{
  protected $table = 'building';
  protected $primaryKey = 'id';
  protected $guarded = array('id');

  public function wards() {
    return $this->hasMany('WardBuilding\Models\Ward');
  }
} 