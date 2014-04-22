<?php

use WardBuilding\Models\Member;

class MemberTableSeeder extends \Illuminate\Database\Seeder{
  public function run() {
    DB::table('member')->delete();
    WardBuilding\Models\Member::create(array(
      'first_name' => 'Joe',
      'last_name' => 'Walker',
      'email' => 'boarderjw@yahoo.com',
      'password' => Hash::make('monkey'),
      'username' => 'boarderjw'
    ));
  }
} 