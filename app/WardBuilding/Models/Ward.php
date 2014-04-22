<?php


namespace WardBuilding\Models;

class Ward extends BaseModel {
  protected $table = 'ward';
  protected $primaryKey = 'id';
  protected $guarded = array('id');

  public function members() {
    return $this->hasMany('WardBuilding\Models\Member');
  }

  public function building() {
    return $this->belongsTo('WardBuilding\Models\Building');
  }
} 