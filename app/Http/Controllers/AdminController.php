<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Storage;

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
        $member = Member::findOrFail($id);

        return view('admin.edit', ['member' => $member]);
    }

    public function store(Request $request){
        $file = $request->file('image');
        $rules = $request->validate([
            'name' => 'required',
            'class' => 'required',
            'phone' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->class = $request->class;
        $member->phone = $request->phone;

        if($request->hasFile('image'))
        {
            $filename = $member->name . '-' . $request->file('image')->getClientOriginalName();
            $member->image_id = $filename;
            $file->move('uploads', $filename);
        }

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
