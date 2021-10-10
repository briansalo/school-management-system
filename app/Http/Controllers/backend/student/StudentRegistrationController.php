<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentPayment;
use App\Models\StudentFee;
use App\Models\FeeCategoryAmount;
use App\Models\StudentGrade;

use DB;
use PDF;

class StudentRegistrationController extends Controller
{
        Public function StudentRegistrationView(){
            $data['class'] = StudentClass::all();
            $data['year'] = StudentYear::all();

            //maybe you can use this kind of code. this code still exist in student view.blade just figure out 
            //$data['year_id'] = StudentYear::orderBy('id','asc')->first()->id;
            //$data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;

            //$data['alldata'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
            $data['alldata'] = AssignStudent::orderBy('id','desc')->get();
        
        
            return view('backend.student.student_reg.student_view', $data);

        }

        public function StudentRegistrationAdd(){
            $data['grades'] = StudentGrade::all();
            $data['class'] = StudentClass::all();
            $data['year'] = StudentYear::all();
            $data['group'] = StudentGroup::all();
            $data['shift'] = StudentShift::all();
            return view('backend.student.student_reg.student_add', $data);
        }

        public function StudentRegistrationStore(Request $request){

            // use db transaction for inserting multiple table. the usage of this is you can get the latest data that inserted and use it to other table. dont forget to declare the db at the top to use this
            DB::transaction(function() use($request){ 

                // TO generate THE I.D. NO. OF THE STUDENT
                $checkyear = StudentYear::find($request->year)->name;
                $student = User::where('usertype','student')->orderBy('id','DESC')->first();
                
                //this condition if theres no student register yet in the table 
                if($student == null){
                    $id_no = '0001';
                }else{
                    
                   $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;  
                   $studentid = $student+1; 
                
                     if($studentid <10){
                            $id_no = '000'.$studentid;
                    }elseif($studentid  < 100){
                            $id_no = '00'.$studentid;  
                     }elseif($studentid < 1000){
                            $id_no = '0'.$studentid;
                     }

                    }// end else
                    $final_id = $checkyear.$id_no;


                    $user = new User();
                    $code = rand(0000,9999); // creating random password
                    $user->id_no = $final_id;
                    $user->password = bcrypt($code);
                    $user->usertype = 'student';
                    $user->code = $code;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->mothers_name = $request->mothers_name;
                    $user->fathers_name = $request->fathers_name;
                    $user->mobile_number = $request->mobile_number;
                    $user->address = $request->address;
                    $user->gender = $request->gender;
                    $user->religion = $request->religion;
                    $user->dob = date('Y-m-d',strtotime($request->dob));
                    $user->gender = $request->gender;

                    if($request->file('image')){  // if there's an image
                        $file= $request->file('image'); // store the image in the variable
                        $filename = date('YmdHi').$file->getClientOriginalName(); // make own name of the images
                        $file->move(public_path('upload/student_images'),$filename); //location of the storage
                        $user['image'] = $filename;                        
                    }
                    $user->save();

                    $assign_student = new AssignStudent();
                    $assign_student->student_id = $user->id; // we can get the latest user id that inserted because we are using db transaction
                    $assign_student->grade_id = $request->grade;
                    $assign_student->year_id = $request->year;
                    $assign_student->class_id = $request->class;
                    $assign_student->group_id = $request->group;
                    $assign_student->shift_id = $request->shift;
                    $assign_student->save();


                    $discount = new DiscountStudent();
                    $discount->assign_student_id = $assign_student->id; // we can use the latest assign_student id because of using db transaction
                    $discount->fee_category_id = '2'; // equavalent to id no 2 in fee categories table which is registration fee. because only registration fee have discount
                    $discount->discount = $request->discount;
                    $discount->save();  




                    $student_fee = StudentFee::all();


                    foreach($student_fee as $value){



                        $feeCategory = FeeCategoryAmount::where('student_fee_id', $value->id)->where('class_id', $request->class)->get();

                        foreach($feeCategory as $value1){
                          //  dd($value1->student_fee_id);
                           // dd($value1->student_fee_id);
                    if($value1->student_fee_id =="2"){
                        $reg_discount = $request->discount;
                    }
                    else{
                     $reg_discount = "0";   
                    }

                    $payment = new StudentPayment();
                    $payment->student_id = $user->id;
                    $payment->fee_category_id = $value1->student_fee_id;
                    $payment->year_id = $request->year;
                    $payment->class_id = $request->class;
                    $payment->discount = $reg_discount;
                    $payment->amount = $value1->amount;
                    $payment->save();  
                        }
                        


                    }

                  


            }); // end db transaction

        $notification = array(
            'message' => 'Student Registration Inserted Successfully',
            'alert-type' => 'success'  //success variable came from admin.blade.php in java script toastr
        );
        return redirect()->route('student.registration.view')->with($notification);
        
        }// end method



        public function StudentYearClassSearch(Request $request){

            //tips if you are using 2 methods in one blade make sure all the variables from two methods have same name to avoid errors. the best way of this just copy all the variable from first method who use in the blade and paste it in the second method 

            $data['class'] = StudentClass::all();
            $data['year'] = StudentYear::all();

            $data['year_id'] = $request->year;
            $data['class_id'] = $request->class;

            $data['alldata'] = AssignStudent::where('year_id',$request->year)->where('class_id',$request->class)->get();
           // dd($data['alldata']->toArray());
            return view('backend.student.student_reg.student_view', $data);
        }


        public function StudentRegistrationEdit($student_id){
            $data['class'] = StudentClass::all();
            $data['year'] = StudentYear::all();
            $data['group'] = StudentGroup::all();
            $data['shift'] = StudentShift::all();

             // i use the with function here to be able to edit the other table make sure the assignstudent have relation to the table you want to edit                               
            $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();

            //dd($data['editData']->toArray());  try this code it might help you to see the exact value of the table
            return view('backend.student.student_reg.student_edit', $data);

        }


        public function StudentRegistrationUpdate(Request $request, $student_id){

           // use db transaction for inserting multiple table. the usage of this is you can get the latest data that inserted and use it to other table. dont forget to declare the db at the top to use this
                DB::transaction(function() use($request, $student_id){ 

                    $user = User::where('id',$student_id)->first();
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->mothers_name = $request->mothers_name;
                    $user->fathers_name = $request->fathers_name;
                    $user->mobile_number = $request->mobile_number;
                    $user->address = $request->address;
                    $user->gender = $request->gender;
                    $user->religion = $request->religion;
                    $user->dob = date('Y-m-d',strtotime($request->dob));
                    $user->gender = $request->gender;

                    if($request->file('image')){  // if there's an image
                        $file= $request->file('image'); // store the image in the variable
                         @unlink(public_path('upload/student_images/'.$user->image)); //delete the previous image
                        $filename = date('YmdHi').$file->getClientOriginalName(); // make own name of the images
                        $file->move(public_path('upload/student_images'),$filename); //location of the storage
                        $user['image'] = $filename;                        
                    }
                    $user->save();

                    $assign_student = AssignStudent::where('student_id',$student_id)->first();
                    $assign_student->year_id = $request->year;
                    $assign_student->class_id = $request->class;
                    $assign_student->group_id = $request->group;
                    $assign_student->shift_id = $request->shift;
                    $assign_student->save();


                    $discount = DiscountStudent::where('assign_student_id',$request->assign_student_id)->first(); 
                    $discount->discount = $request->discount;
                    $discount->save();       

            }); // end db transaction

        $notification = array(
            'message' => 'Student Registration Updated Successfully',
            'alert-type' => 'success'  //success variable came from admin.blade.php in java script toastr
        );
        return redirect()->route('student.registration.view')->with($notification);
        
        }// end method


      
    public function StudentRegistrationPromote($student_id){
            $data['class'] = StudentClass::all();
            $data['year'] = StudentYear::all();
            $data['group'] = StudentGroup::all();
            $data['shift'] = StudentShift::all();

             // i use the with function here to be able to edit the other table make sure the assignstudent have relation to the table you want to edit                               
            $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();

            //dd($data['editData']->toArray());  try this code it might help you to see the exact value of the table
            return view('backend.student.student_reg.student_promote', $data);

    }  


    public function StudentRegistrationUpdatePromote(Request $request, $student_id){
         // use db transaction for inserting multiple table. the usage of this is you can get the latest data that inserted and use it to other table. dont forget to declare the db at the top to use this
                DB::transaction(function() use($request, $student_id){ 

                    $user = User::where('id',$student_id)->first();
                    $user->email = $request->email;
                    $user->mobile_number = $request->mobile_number;
                    $user->address = $request->address;
                    $user->religion = $request->religion;

                    if($request->file('image')){  // if there's an image
                        $file= $request->file('image'); // store the image in the variable
                         @unlink(public_path('upload/student_images/'.$user->image)); //delete the previous image
                        $filename = date('YmdHi').$file->getClientOriginalName(); // make own name of the images
                        $file->move(public_path('upload/student_images'),$filename); //location of the storage
                        $user['image'] = $filename;                        
                    }
                    $user->save();

                    $assign_student = new AssignStudent();
                    $assign_student->student_id = $student_id;
                    $assign_student->year_id = $request->year;
                    $assign_student->class_id = $request->class;
                    $assign_student->group_id = $request->group;
                    $assign_student->shift_id = $request->shift;
                    $assign_student->save();


                    $discount = new DiscountStudent(); 
                    $discount->assign_student_id = $assign_student->id; // we can use the latest assign_student id because of using db transaction
                    $discount->fee_category_id = '2'; // equavalent to id no 2 in fee categories table which is registration fee. because only 
                    $discount->discount = $request->discount;
                    $discount->save();       

            }); // end db transaction

        $notification = array(
            'message' => 'Student Promotion Updated Successfully',
            'alert-type' => 'success'  //success variable came from admin.blade.php in java script toastr
        );
        return redirect()->route('student.registration.view')->with($notification);
    }



    public function StudentRegistrationDetails($student_id){


          $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
            // return view('backend.student.student_reg.student_detail', $data);

             //view()->share('alldata',$data);
              $pdf = PDF::loadView('backend.student.student_reg.student_detail', $data);
              
                return $pdf->download('pdf_file.pdf');

                
    }

}
