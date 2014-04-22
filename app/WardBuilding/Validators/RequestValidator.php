<?php


namespace WardBuilding\Validators;


use Illuminate\Support\Facades\Validator;

class RequestValidator {

  public function __construct() {

  }

  public function validateCreate($actionData) {

  }

  public function validateCreateInput($input) {
    $rules = array(
      'member_id' => 'required|integer|exists:member,id',
      'title' => 'required|max:255',
      'desc' => 'required'
    );

    $messages = array(

    );
    $validator = Validator::make($rules, $messages);
    if ($validator->fails()) {

    }
  }
} 