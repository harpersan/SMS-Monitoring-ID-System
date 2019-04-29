<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRegistrationRequest;
use App\User;
use App\AUStatus;
use App\Photo;
use App\Role;


class UserCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $admin = User::all();

        return view('admin.adminUser.index', compact('admin'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $status = AUStatus::pluck('name','id')->all();
        $role = Role::pluck('name','id')->all();
        
        return view('admin.adminUser.create', compact('status', 'role'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRegistrationRequest $request)
    {


        $input = $request->all();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['image_name'=>$name]);

            $input['photo_id'] = $photo->id;

            $input['password'] = bcrypt($request->password);
        }


            User::create($input);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $status = AUStatus::pluck('name','id')->all();

        $user = User::findOrFail($id);

        return view('admin.adminUser.edit', compact('status', 'user'));

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

    if (trim($request->password == "")) {

        $input = $request->except('password');
            
    } else {

          $input = $request->all();

          $input['password'] = bcrypt($request->password);
    }

        
        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['image_name'=>$name]);

            $input['photo_id'] = $photo->id;

            
        }


            User::whereId($id)->first()->update($input);

            return redirect('/admin/dashboard');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->admin) {

            unlink(public_path() . $user->admin->image_name);

            $user->delete();

            return redirect('/admin/dashboard');
        }else 

            $user->delete();

            return redirect('/admin/dashboard');

    }
}
