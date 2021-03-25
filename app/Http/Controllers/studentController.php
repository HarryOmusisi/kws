<?php

namespace App\Http\Controllers;

use App\fees;
use Illuminate\Http\Request;
use App\student;
use Illuminate\Support\Facades\Input;

class studentController extends Controller
{

    //view all records
    public function show(){
        //$student = student::has('fees')->get();
        $student = student::all();

          //get sum fees for each student
          foreach ($student as $s) {
            $total_fees = $this->total_fees($s->id);
            $s['total'] = $total_fees; 
          }

        //get sum of all fees
        $sum_all_fees = fees::all()->sum('amount_paid');

        return view('brian_mutinda/all_students',['students'=>$student,'all_fees'=>$sum_all_fees]);

    }

    //get total fees per student
    public function total_fees($student_id){
      $student_total_fees = student::find($student_id)->fees->sum('amount_paid');
      return $student_total_fees;

    }

    //view a specific record
    public function show_student_info($student_id){
        $student = student::find($student_id)->fees;//relationship
        $student_name = student::find($student_id)->full_name;
        return view('brian_mutinda/student_info',['student'=>$student,'student_name'=>$student_name,'student_id'=>$student_id]);
    }

    //search for a student and return fees payment
    public function search_student(Request $request){
        //check if student exists in the database

        //1. Get the ID from the texfield
        $student_id = request('student_number');

        //2. search for a student record in the db
          /*
            An alternative to get the input
            $student_exist = student::where('id','=',Input::get('student_number'))->count();
          */  
        $student_exist = student::where('id','=',$student_id)->count();

          if($student_exist > 0){
            /*
              student record exists 
              call the function show_student_info
            */

           // return $this->show_student_info(Input::get('student_number'));
              return $this->show_student_info($student_id);

          }else{
            /*
              student record does not exist
              return to homepage
              show error message
            */

            return redirect('/')->with('error_message','The record does not exist');
          }

    }

    //store data in db
    public function store(Request $request){
       // $request = new Request;

        //lets validate data first
         $request->validate([
           'full_name' => 'required',
            'date_of_birth' => 'required',
            'address'=>'required'
        ]);
         //when validation fails we return student to same page by default

        //create an instance of student model
        $student = new student;

        //take data from the form
        $student->full_name = request('full_name');
        $student->date_of_birth = request('date_of_birth');
        $student->address = request('address');

        //save data
        $student->save();

        //return user to main page
        return redirect('/student')->with('message','Record has been saved sucessfully');

    }

}
