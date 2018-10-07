<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $members = Member::all();
        return view('members.member',['members' => $members]);
    }

    public function create(){
        return view('members.create');
    }

    public function show($id){
        $member = Member::find($id);
        return view('members.show', ['member' => $member]);
    }

    public function store(Request $request){
        $rules = $request->validate([
            'name' => 'required',
            'class' => 'required',
            'phone' => 'required|numeric'
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->class = $request->class;
        $member->phone = $request->phone;

        $member->save();
        return redirect('member');
    }

    public function edit($id){
        $member = Member::find($id);

        return view('members.edit', ['member' => $member]);
    }

    public function update(Request $request, $id){
        $rules = $request->validate([
            'name' => 'required',
            'class' => 'required',
            'phone' => 'required|numeric'
        ]);

        $member = Member::find($id);
        $member->name = $request->name;
        $member->class = $request->class;
        $member->phone = $request->phone;

        $member->save();
        return redirect('member');
    }

    public function destroy($id){
        $member = Member::find($id);
        $member->delete();

        return redirect('member');
    }
}
