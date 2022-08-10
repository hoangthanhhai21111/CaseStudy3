<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Models\Position;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     

        $users= User::all();
        return view('user.index', compact('users'));
        //
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $position = Position::all();
        return view('user.create', compact('position'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $users = new User();
        $users->name= $request->name;
        $users->phone= $request->phone;
        $users->email= $request->email; 
        $users->address= $request->address;
        $users->day_of_birth= $request->day_of_birth; 
        $users->position= $request->position; 
        $users->password= bcrypt('admin'); 
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            $path = 'storage/'. $request->file('image')->store('images', 'public');//lưu file vào mục public/images với tê mới là $newFileName
            $users->image = $path;
        }
        Session::flash('create-success','update user successfully');
        $users->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('users.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user= User::find($id);
        return view('user.edit',compact('user'));
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
        $user= User::find($id);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->email= $request->email; 
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            // $Status->image = $newFileName;// cột image gán bằng tên file mới
            $path = 'storage/'. $request->file('image')->store('images', 'public');//lưu file vào mục public/images với tê mới là $newFileName
            $user->image = $path;
        }
        $user->save();

        // $message = "Tạo Task $request->image thành công!";
        Session::flash('create-success','update user successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return redirect()->route('index');
    }
}
