<?php

namespace App\Http\Controllers\Admin;
use App\Student;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        return view('admin.userTable')
        ->with(array('users'=>$users,
        
         'totalStudents' => $totalStudents,
         'totalUsers' =>$totalUsers,
         'MaleOfStudents' =>$MaleOfStudents,
         'FemaleOfStudents' =>$FemaleOfStudents,
         'followUpList' =>$followUpList,
         'archiveList'=>$archiveList
        
        ));
        
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
    public function store(Request $request)
    {
       
        //
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
        $users = User::find($id);
        $users -> delete();  
        return back();
    }
    
    public function showPageAddTutor($id){
        $user = new User();
        $student = Student::find($id);
        $tutors = $user::all();
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        return view('admin.addTutorToStudent')
        ->with(array('tutors'=>$tutors,
         'student'=>$student,
         'totalStudents' => $totalStudents,
         'totalUsers' =>$totalUsers,
         'MaleOfStudents' =>$MaleOfStudents,
         'FemaleOfStudents' =>$FemaleOfStudents,
         'followUpList' =>$followUpList,
         'archiveList'=>$archiveList
        
        ));
    }

    public function changePhotoTutor(){
        $auth = Auth::user();
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/assets/img/'), $imageName);

        $auth -> profile = $imageName;

        $auth -> save();
        return back();
    }
}
