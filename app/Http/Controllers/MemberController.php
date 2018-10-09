<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('member.member',['members' => $members]);
    }
    
    public function show($id){
        $member = Member::find($id);
        return view('member.show', ['member' => $member]);
    }
}
