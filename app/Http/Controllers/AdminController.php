<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        $members = Member::all();
        return view('admin.member',['members' => $members]);
    }

    public function create(){
        return view('admin.create');
    }

    public function edit($id){
        $member = Member::find($id);

        return view('admin.edit', ['member' => $member]);
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
        return redirect('admin');
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
        return redirect('admin');
    }

    public function destroy($id){
        $member = Member::find($id);
        $member->delete();

        return redirect('admin');
    }
}
