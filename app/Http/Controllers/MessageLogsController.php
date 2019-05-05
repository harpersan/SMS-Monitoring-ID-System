<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\TapRequest;
use App\Student;
use Carbon\Carbon;
use App\Log;

class MessageLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Carbon::now();
        $student_logs = Log::whereLogin_date($dt->toDateString())
        ->orderBy('updated_at','desc')->take(1)
        ->get();

        return view('admin.studentInOut', compact('student_logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TapRequest $request)
    {
        
        // Check Database if student Exist //

        $student = Student::whereStudent_id($request->student_id)->get();

        $student_id = '';  // set an empty variable to get the value inside for each loop      
        $photo = '';       // set an empty variable to get the value inside for each loop     
        $mobile_number ='';// set student guardian cellphone number to get the value inside for each loop 
        $student_name = '';// set student name to get the value inside for each loop 

        foreach ($student as $value) {
           
            $student_id = $value->student_id;
            $photo = $value->photo_id;
            $student_name = $value->firstName. ' ' .$value->middleName. ' ' .$value->lastName;
            $mobile_number = $value->mobile_number;

        }

        ##################################################################
            
            if($request->student_id == $student_id) {
                
                //check if student log already to avoid double record // 

                $logs =  Log::whereStudent_id($request->student_id)->get();

                $login_date = ''; // set an empty variable to get the value inside for each loop
                $logout_date = '';// set an empty variable to get the value inside for each loop
                $login_time = ''; // set an empty variable to get the value inside for each loop
                $login_DT = '';

                // loop through logs table to get the login date, logintime, logout date //

                    foreach ($logs as $log) {
                        
                        $login_date = $log->login_date;
                        $logout_date = $log->logout_date;
                        $login_time = $log->created_at;

                        $login_DT = $log->login_time . ' ' . $log->login_date;


                        
                    }

                        //##########################################################################
                        // ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
                        // Visit www.itexmo.com/developers.php for more info about this API
                        //##########################################################################
                        function itexmo($number,$message,$apicode){
                        $url = 'https://www.itexmo.com/php_api/api.php';
                        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
                        $param = array(
                            'http' => array(
                                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                'method'  => 'POST',
                                'content' => http_build_query($itexmo),
                            ),
                        );
                        $context  = stream_context_create($param);
                        return file_get_contents($url, false, $context);}
                        //##########################################################################


                $dt = Carbon::now(); // to get the current date and time //
                                     // toDateString() to get only the Date // 
                                     
                    if($login_date != $dt->toDateString()) { // if login_date on logs table is not equal to 
                                                             //   current Date insert DATA //
                
                        $input['student_id'] = $request->student_id;

                        $input['is_login'] = 1 ;

                        $input['photo_id'] = $photo;

                        $input['login_date'] = Carbon::now();

                        $input['login_time'] = Carbon::now();

                        $logs = Log::create($input);

                            $number = $mobile_number;
                            $message = $student_name.' '.'Enter the School premises at'.', '.$logs->login_time;
                            $apicode = "TR-TOMGE416390_6AV2X";

                        ###################################################################
                            $result = itexmo($number,$message,$apicode);
                            if ($result == ""){
                            echo "iTexMo: No response from server!!!
                            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
                            Please CONTACT US for help. ";  
                            }else if ($result == 0){
                            echo "Message Sent!";
                            }
                            else{   
                            echo "Error Num ". $result . " was encountered!";
                            }
                        ##################################################################        

                        return redirect('/admin/index');

                    } elseif($logout_date != $dt->toDateString() && time() >= strtotime("{$login_time} +15 minutes")  ) {     // if logout_date in logs table is not equal to the Current date and Current time is greater than login_time in the logs table + 15mins.               

                    // used raw sql update query because the method from form is POST in other words its add another entry not update //

                    DB::update("UPDATE logs 
                        SET is_login = 0, 
                            logout_date = '$dt', 
                            logout_time = '$dt',
                            updated_at = '$dt' 
                            WHERE student_id = $request->student_id
                            ORDER BY id DESC LIMIT 1");

                            $number = $mobile_number;
                            $message = $student_name.' '.'Leave the School premises at'.', '.$dt;
                            $apicode = "TR-TOMGE416390_6AV2X";

                        ###################################################################
                            $result = itexmo($number,$message,$apicode);
                            if ($result == ""){
                            echo "iTexMo: No response from server!!!
                            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
                            Please CONTACT US for help. ";  
                            }else if ($result == 0){
                            echo "Message Sent!";
                            }
                            else{   
                            echo "Error Num ". $result . " was encountered!";
                            }
                        ##################################################################                        
                        return redirect('/admin/index');
                       
                    } else {

                        return redirect('/admin/index'); // if all condition not meet redirect to login panel //

                        }


            }  else {  // if student id not exist redirect to login panel

                return redirect('/admin/index');

            }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $dt = Carbon::now();

        $dailyLogs = Log::whereLogin_date($dt->toDateString())
        ->orderBy('updated_at','desc')
        ->get();

        return view('admin.dailylogs', compact('dailyLogs'));
    }

    /**
     * Show the form for editing the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
