<?php


namespace WardBuilding\Models;

class Request extends BaseModel {
  protected $table = 'request';
  protected $primaryKey = 'id';
  protected $guarded = array('id');

  public function member() {
    return $this->belongsTo('WardBuilding\Models\Member');
  }
} 