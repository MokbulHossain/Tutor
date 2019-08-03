<?php

namespace App\Http\Controllers;
use App\Tutor;
use App\Contact;
use App\Hire;
use App\Qualififation;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected function tutors(){
    	$tutors = Tutor::paginate(10);
    	$qualififations = Qualififation::distinct()->get(['subject']);;
    	$qualification_levels = Qualififation::distinct()->get(['qualification_level']);;
    	return view('tutors',compact('tutors','qualififations','qualification_levels'));
    }
     protected function tutor_details($id){
     	$tutor = Tutor::find($id);
     	 $hires = Hire::where('tutor_id',$tutor->id)->where('status','like',"Accepted")->get();
     	$days = ['SAT','SUN','MON','TUE','WED','THU','FRI'];
    	return view('tutor_details',compact('tutor','days','hires'));
    }
    protected function search_tutor(Request $request){
    	 $data = $request->all();
    	 $quali = Qualififation::where('subject','like','%'.$data['subject'].'%')->where('qualification_level','like','%'.$data['qualification_level'].'%')->get();
    	 $quali_id=array();
    	 foreach ($quali as $key ) {
    	 	$quali_id[]=$key->tutor_id;
    	 }
    	 if($data['address'] == NULL){
    	 	$tutors = Tutor::whereIn('id',$quali_id)->paginate(10);
    	 }
    	 else{
    	 	$tutors = Tutor::where('address','like','%'.$data['address'].'%')->whereIn('id',$quali_id)->paginate(10);
    	 }

    	$qualififations = Qualififation::distinct()->get(['subject']);;
    	$qualification_levels = Qualififation::distinct()->get(['qualification_level']);;
    	return view('tutors',compact('tutors','qualififations','qualification_levels'));
    }
    protected function contact_submit(Request $request){
    	 $data = $request->all();
        $contact = new Contact;
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->web_url = $data['web_url'];
        $contact->message = $data['message'];
        if($contact->save()){
        	return redirect()->back()->with('message','Your Message is successfully send !!');
        }
        else{
        	return redirect()->back()->with('error','There have error..Please try again!!');
        }
    }
}
