<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRegistration;
use App\User;
use App\Grade;
use App\Section;
use App\Student;
use App\Photo;

class StudentCrudController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $year_level = Grade::pluck('name','id')->all();
        $section = Section::pluck('name','id')->all();

        return view('admin.student.create',compact('year_level','section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRegistration $request)
    {
        

        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['image_name'=>$name]);

            $input['photo_id'] = $photo->id;
        }
            
            $code =  $request->grade_id . $request->section_id; 

            $input['g_s_code'] = $code;

        Student::create($input);

        return redirect('/admin/dashboard');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $g_s = Student::whereG_s_code($id)->get();

        return view('admin.student.grade&section.grade&section', compact('g_s'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Student::findOrFail($id);

        $year_level = Grade::pluck('name','id')->all();
        $section = Section::pluck('name','id')->all();

        return view('admin.student.edit',compact('user', 'year_level', 'section'));
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

        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['image_name'=>$name]);

            $input['photo_id'] = $photo->id;
        }
            
            $code =  $request->grade_id . $request->section_id; 

            $input['g_s_code'] = $code;

        Student::whereId($id)->first()->update($input);

        return redirect('admin/dashboard');

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if($student->photo) {

        unlink(public_path() . $student->photo->image_name);

        $student->delete();

        return redirect('/admin/dashboard');

        } else

        $student->delete();

        return redirect('/admin/dashboard');
    }
}
