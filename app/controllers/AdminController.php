<?php

use WardBuilding\Models\Request;
use WardBuilding\Models\Member;

class AdminController extends BaseController {

	public function showAllRequests() {
    $requests = Request::all();
    foreach ($requests as $req) {
      $member_id = $req['member_id'];
      $member = Member::find($member_id);
      $req['building'] = $member->ward()->first()->building()->first()->name;
      $req['name'] = $member['first_name'] . ' ' . $member['last_name'];
    }
    return View::make('all_requests')->with('requests', $requests);
  }

  public function showPendingRequests() {
    $requests = Request::where('status', 'pending')->get();
    foreach ($requests as $req) {
      $member_id = $req['member_id'];
      $member = Member::find($member_id);
      $req['building'] = $member->ward()->first()->building()->first()->name;
      $req['name'] = $member['first_name'] . ' ' . $member['last_name'];
    }
    return View::make('all_requests')->with('requests', $requests);
  }

  public function showBuildings() {
    $buildings = \WardBuilding\Models\Building::all();
    return View::make('buildings')->with('buildings', $buildings);
  }

  public function showMembers() {
    $members = Member::all();
    foreach ($members as $member) {
      $member['ward'] = $member->ward()->first()->name;
    }
    return View::make('members')->with('members', $members);
  }

  public function showWards() {
    $wards = \WardBuilding\Models\Ward::all();
    foreach ($wards as $ward) {
      $building = $ward->building()->first();
      $ward['street'] = $building->street;
      $ward['city'] = $building->city;
      $ward['state'] = $building->state;
      $ward['postal_code'] = $building->postal_code;
    }
    return View::make('wards')->with('wards', $wards);
  }

  public function showEditRequest($id) {
    $req = Request::find($id);
    return View::make('edit_request')->with('request', $req);

  }

  public function update($id) {
    $req = Request::find($id);
    $req->update(Input::all());
    return View::make('admin_dashboard')->with('message', 'Request updated.');
  }

  public function destroy($id) {
    $req = Request::find($id);
    $req->delete();
    return View::make('admin_dashboard')->with('message', 'Request deleted.');
  }

  public function showDashboard() {
    return View::make('admin_dashboard');
  }



}
