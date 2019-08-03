<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\Hire;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     protected function hire_me($id){
       return view('booking_page',compact('id'));
    }
      protected function booking_me(Request $request){
        $tutor_id = $request->input('tutor_id');
        $hire = new Hire;
        $hire->tutor_id = $tutor_id;
        $hire->student_id = Auth::user()->id;
        $hire->save();
        return redirect('hire_list');
    }
     protected function hire_list(){
        $hires = Hire::where('student_id',Auth::user()->id)->get();
        return view('hire',compact('hires'));
    }
    public function profile(){
        $profile = User::find(Auth::user()->id);
        return view('profile',compact('profile'));
    }
    
    public function edit_student_profile(Request $request){
            $this->validate($request, [
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
         $data = $request->all();
          $image = $request->file('photo');
        $profile = User::find(Auth::user()->id);
        $profile->name = $data['name'];
        $profile->email = $data['email'];
        $profile->school_name = $data['school_name'];
        $profile->phone = $data['phone'];
        $profile->address = $data['address'];
        $profile->school_location = $data['school_location'];
        $profile->parent_name = $data['parent_name'];
        $profile->DOB = $data['DOB'];
        $profile->parent_email = $data['parent_email'];

        
         
          if($image !=NULL){
               if($profile->photo){
               unlink($profile->photo);  
             }
              $img = time().$data['email'].'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('/img/parent');
             $image->move($destinationPath, $img);
            $profile->photo = 'img/student/'.$img; 
         }
         if ($profile->save()) {
             return redirect()->back()->with('message','Profile Update successful !!');
         }
         else{
           return redirect()->back()->with('error','There have error!! please try again.');
         }
    }
    
    public function setting(){
        return view('setting');
    } 
    
    public function change_setting(Request $request){
         $data = $request->all();
        $current_password = Auth::User()->password;
        if(Hash::check($data['old_password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
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
