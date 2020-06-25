<?php

namespace App\Http\Controllers\Author;
use App\Student;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        //
    }
     // view details of students
     public function details($id)
     {  
         $student = Student::find($id);
         return view('author.student.viewdetail', compact('student'));
     }
    
      //function view follow up list
      public function viewFollowUpList(){
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        $totalUsers = User::all()->count();
        $students = Student::where('status',1)->get();
        return view('author.followUpList')
        ->with(array('students'=> $students,
        // 'countStudents'=>$countStudents,
        'totalStudents' => $totalStudents,
            'totalUsers' =>$totalUsers,
            'MaleOfStudents' =>$MaleOfStudents,
            'FemaleOfStudents' =>$FemaleOfStudents,
            'followUpList' =>$followUpList,
            'archiveList'=>$archiveList
    ));
    }
    //function view achive list
     public function viewAchiveList(){
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        $totalUsers = User::all()->count();
        $students = Student::where('status',2)->get();
        return view('author.archiveList')
        ->with(array('students'=> $students,
        // 'countStudents'=>$countStudents,
        'totalStudents' => $totalStudents,
            'totalUsers' =>$totalUsers,
            'MaleOfStudents' =>$MaleOfStudents,
            'FemaleOfStudents' =>$FemaleOfStudents,
            'followUpList' =>$followUpList,
            'archiveList'=>$archiveList
    ));
    }
    
    
    public function tutorMentorStudents(){
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        $totalUsers = User::all()->count();
        $students = Student::all()->where('user_id', Auth::user()->id);
        // $students = Student::all()->where('status', 1);
        $countStudents = Student::all()->where('user_id', Auth::user()->id)->count();
        return view('author.oneTutorCanControllerStudents')
        ->with(array('students'=>$students,
        'countStudents'=>$countStudents,
        'totalStudents' => $totalStudents,
            'totalUsers' =>$totalUsers,
            'MaleOfStudents' =>$MaleOfStudents,
            'FemaleOfStudents' =>$FemaleOfStudents,
            'followUpList' =>$followUpList,
            'archiveList'=>$archiveList
    ));

    }

    public function viewSpecificthatTutorsComment($id){
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        $totalUsers = User::all()->count();
        
        
        $users = User::find($id);
        $comments= $users->comments;
        
        return view('author.viewSpecificthatTutorsComment')
        ->with(array('comments'=> $comments,
        // 'countStudents'=>$countStudents,
        'totalStudents' => $totalStudents,
            'totalUsers' =>$totalUsers,
            'MaleOfStudents' =>$MaleOfStudents,
            'FemaleOfStudents' =>$FemaleOfStudents,
            'followUpList' =>$followUpList,
            'archiveList'=>$archiveList
    ));


}

public function mentorStudentsSpecificOfTutors($id){
    $totalStudents = Student::all()->count();
    $MaleOfStudents = Student::all()->where('gender','Male')->count();
    $FemaleOfStudents = Student::all()->where('gender','Female')->count();
    $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
    $totalUsers = User::all()->count();
    
    // $students = Student::all()->where('user_id', Auth::user()->id);
    // $countStudents = Student::all()->where('user_id', Auth::user()->id)->count();
    // $students = Student::find($id);
    $users = User::find($id);
    $students= $users->students;
    $countStudents= $users->students->count();
    return view('author.findStudentThatOneTutorControl')
    ->with(array('students'=>$students,
    'countStudents'=>$countStudents,
    'totalStudents' => $totalStudents,
        'totalUsers' =>$totalUsers,
        'MaleOfStudents' =>$MaleOfStudents,
        'FemaleOfStudents' =>$FemaleOfStudents,
        'followUpList' =>$followUpList,
        'archiveList'=>$archiveList
));
}
}