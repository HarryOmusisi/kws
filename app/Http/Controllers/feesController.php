<?php

namespace App\Http\Controllers;

use App\fees;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class feesController extends Controller
{
    //
    public function store(Request $request){
        //validate the data

        //1. ensure data is not empty
        $request->validate([
            //'student_id' => 'required|integer|unique:students,id',
            'student_id' => 'required|integer',
            'date_of_payment' => 'required',
            'amount_paid'=>'required|integer'
        ]);

        //2. check if the student_id exists
        $student_exist = student::where('id','=',Input::post('student_id'))->count();

      //  if($student_exist > 0){
            /*
             * The student exists
             *  Send the data to the database
            */

            //create a new instance of the fees model
            $fees = new fees;

            //take the data from the form
            $fees->student_id = request('student_id');
            $fees->date_of_payment = request('date_of_payment');
            $fees->amount_paid = request('amount_paid');

            //save the data
            $fees->save();

            //return to main page
            return redirect('/fees')->with('message','Record saved successfully');

        //}else{
            //The student does not exist
           // return redirect('/fees')->with('message','The student does not exist. Record has not been saved.');
        //}



    }
}
