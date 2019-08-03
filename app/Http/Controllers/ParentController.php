<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Student_Parent;
use App\Hire;
class ParentController extends Controller
{
     public function __construct()
    {
    	$this->middleware('auth:parent');
    }
    protected function home(){
    	return view('Parent.home');
    }
    
    protected function hire_me($id){
        return view('Parent.booking_page',compact('id'));
    }
    protected function booking_me(Request $request){
        $tutor_id = $request->input('tutor_id');
        $hire = new Hire;
        $hire->tutor_id = $tutor_id;
        $hire->parent_id = Auth::user()->id;
        $hire->save();
        return redirect('parent/hire_list');
    }
    protected function hire_list(){
        $hires = Hire::where('parent_id',Auth::user()->id)->get();
        return view('Parent.hire',compact('hires'));
    }
    protected function profile(){
        $profile = Student_Parent::find(Auth::user()->id);
        return view('Parent.profile',compact('profile'));
    }
     protected function edit_profile(Request $request){
        $this->validate($request, [
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
         $data = $request->all();
          $image = $request->file('photo');
        $profile = Student_Parent::find(Auth::user()->id);
        $profile->name = $data['name'];
        $profile->email = $data['email'];
        $profile->student_name = $data['student_name'];
        $profile->student_school_name = $data['student_school_name'];
        $profile->address = $data['address'];
        $profile->phone = $data['phone'];
        
         
         if($image !=NULL){
             if($profile->photo){
           unlink($profile->photo);  
         }
              $img = time().$data['email'].'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('/img/parent');
             $image->move($destinationPath, $img);
            $profile->photo = 'img/parent/'.$img; 
         }
       
         //$data['photo']->storeAs('img/tutor', $image );
         if ($profile->save()) {
             return redirect()->back()->with('message','Profile Update successful !!');
         }
         else{
           return redirect()->back()->with('error','There have error!! please try again.');
         }
        
    }
    
    protected function setting(){
        return view('Parent.setting');
    }
    
    protected function change_parent_setting(Request $request){
            $data = $request->all();
        $current_password = Auth::User()->password;
        if(Hash::check($data['old_password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = Student_Parent::find($user_id);
        $obj_user->password = Hash::make($data['new_password']);;
        $obj_user->save(); 
         return redirect()->back()->with('message','Password Update successful !!');
      }
      else
      {   
           return redirect()->back()->with('error','Please enter correct current password !!');
      }
    }
}
