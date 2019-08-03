<?php

namespace App\Http\Controllers;
use App\Qualififation;
use App\Avilabilitie;
use App\Tutor;
use App\Academic_qualification;
use App\Hire;
use Illuminate\Http\Request;
use Auth;
use Hash;
class TutorController extends Controller
{
     public function __construct()
    {
    	$this->middleware('auth:tutor');
    }
    protected function home(){
    	return view('Tutor.home');
    }
    protected function update_status(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        $hire = Hire::find($id);
        $hire->status = $status;
        $hire->save();
        return redirect()->back();
    }
    protected function subject_offer(){
    	$offer_subjects = Qualififation::where('tutor_id',Auth::user()->id)->get();
    	return view('Tutor.subject_offer',compact('offer_subjects'));
    }
    protected function hire_list(){
        $hires = Hire::where('tutor_id',Auth::user()->id)->get();
        return view('Tutor.hire',compact('hires'));
    }

    protected function new_offer_subject(){
        return view('Tutor.new_offer_subject');
    }
    protected function submit_offer_subject(Request $request){
       $subject_name = $request->input('subject_name');
       $qualification_level = $request->input('qualification_level');
       $price = $request->input('Price');
       
       $qualififation = new Qualififation();
       $qualififation->tutor_id=Auth::user()->id;
       $qualififation->subject=$subject_name;
       $qualififation->qualification_level=$qualification_level;
       $qualififation->price= $price ;
       if($qualififation->save()){
        return redirect('tutor/subject_offer')->with('message','Offer Subject create successful !!');
       }
       else{
        return redirect()->back()->with('message','There have error!! please try again.');
       }
    }
     protected function update_offer_subject(Request $request){
       $subject_name = $request->input('subject_name');
       $id = $request->input('id');
       $qualification_level = $request->input('qualification_level');
       $price = $request->input('Price');
       
       $qualififation = Qualififation::find($id);
       $qualififation->subject=$subject_name;
       $qualififation->qualification_level=$qualification_level;
       $qualififation->price= $price ;
       if($qualififation->save()){
        return redirect('tutor/subject_offer')->with('message','Offer Subject Update successful !!');
       }
       else{
        return redirect()->back()->with('message','There have error!! please try again.');
       }
    }

    protected function offer_subject_edit($id){
        $qualififation = Qualififation::find($id);
        return view('Tutor.new_offer_subject',compact('qualififation'));
    } 
    protected function offer_subject_destroy($id){
        $qualififation = Qualififation::find($id);
        if($qualififation->delete()){
        return redirect('tutor/subject_offer')->with('message','Offer Subject Delete successful !!');
       }
       else{
        return redirect()->back()->with('message','There have error!! please try again.');
       }
    }

    protected function availability_day(){
        $avilabilities = Avilabilitie::where('tutor_id',Auth::user()->id)->get();
        $days = ['SAT','SUN','MON','TUE','WED','THU','FRI'];
        $a_v=array();
        foreach ($avilabilities as $key) {
            $a_v[] = $key->day;
        }
        $a_v[]=0;
        return view('Tutor.availability_day',compact('avilabilities','days','a_v'));
    }
    protected function avilable_time_add(Request $request){
         $value = $request->form_data;
         $exist = Avilabilitie::where('tutor_id',Auth::user()->id)->where('day',$value[0]['value'])->first();
         if(empty($exist)){
                $avilabilities = new Avilabilitie;
                $avilabilities->tutor_id = Auth::user()->id;
                $avilabilities->day = $value[0]['value'];
               for($i=1;$i<4;$i++){
                    if(isset($value[$i]['value'])){
                       if($value[$i]['value'] == 1){
                         $avilabilities->avilable_time1 = 1;
                       }
                       elseif($value[$i]['value'] == 2){
                         $avilabilities->avilable_time2 = 1;
                       }
                       elseif($value[$i]['value'] == 3){
                         $avilabilities->avilable_time3 = 1;
                       }
                    }
              }
                
                if($avilabilities->save()){return '11';}
                else{return '00';}
    }
    else{return '00';}
    }
    protected function avilable_time_edit(Request $request){
        $value = $request->form_data;
        $avilabilities = Avilabilitie::find($value[0]['value']);
        $avilabilities->day = $value[1]['value'];
         $avilabilities->avilable_time1 = 0;
         $avilabilities->avilable_time2 = 0;
         $avilabilities->avilable_time3 = 0;
       for($i=2;$i<5;$i++){
            if(isset($value[$i]['value'])){
               if($value[$i]['value'] == 1){
                 $avilabilities->avilable_time1 = 1;
               }
               elseif($value[$i]['value'] == 2){
                 $avilabilities->avilable_time2 = 1;
               }
               elseif($value[$i]['value'] == 3){
                 $avilabilities->avilable_time3 = 1;
               }
            }
      }
        
        if($avilabilities->save()){return '11';}
        else{return '00';}

    } 
    protected function avilable_time_destroy($id){
        $avilabilities = Avilabilitie::find($id);
        if($avilabilities->delete()){
        return redirect('tutor/availability_day')->with('message','Offer Subject Delete successful !!');
       }
       else{
        return redirect()->back()->with('message','There have error!! please try again.');
       }
    }

    protected function profile(){
        $profile = Tutor::find(Auth::user()->id);
        return view('Tutor.profile',compact('profile'));
    }
     protected function edit_profile(Request $request){
         
         $data = $request->all();
          foreach($data as $key=>$value){
              $data2[] = $value;
          }
    
         $data = $request->all();
          $image = $request->file('photo');
        $profile = Tutor::find(Auth::user()->id);
        $profile->name = $data['name'];
        $profile->email = $data['email'];
        $profile->institute_name = $data['institute_name'];
        $profile->charge_per_houre = $data['charge_per_houre'];
        $profile->address = $data['address'];
        $profile->about = $data['about'];
        $profile->about_my_session = $data['about_my_session'];
         
          if($image !=NULL){
              
              if($profile->photo){
           unlink($profile->photo);  
         }
              $img = time().$data['email'].'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('/img/tutor');
             $image->move($destinationPath, $img);
            $profile->photo = 'img/tutor/'.$img; 
         }
   
         if ($profile->save()) {
             
             $row_count = $request->input('row_count');
            $tutors_qua = Academic_qualification::where('tutor_id',Auth::user()->id)->get();
             foreach($tutors_qua as $tutors_q){
                 Academic_qualification::find($tutors_q->id)->delete();
             }
             if($row_count>0){
                  $in = 0;
                 for($i = 0;$i<$row_count;$i++){ 
                    if($data2[9+$in] != NULL){
                     $academic_qualification = new Academic_qualification;
                     $academic_qualification->tutor_id = Auth::user()->id;
                     $academic_qualification->degree_name = $data2[9+$in];
                     $academic_qualification->institute = $data2[10+$in];
                     $academic_qualification->grade = $data2[11+$in];
                     $academic_qualification->passing_year = $data2[12+$in];
                     
                     $academic_qualification->save();
                    }
                    $in = $in+5;
                 }
             }
             return redirect()->back()->with('message','Profile Update successful !!');
         }
         else{
           return redirect()->back()->with('error','There have error!! please try again.');
         }
        
    }
    
    protected function setting(){
        return view('Tutor.setting');
    }
    
    protected function change_tutor_setting(Request $request){
            $data = $request->all();
        $current_password = Auth::User()->password;
        if(Hash::check($data['old_password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = Tutor::find($user_id);
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
