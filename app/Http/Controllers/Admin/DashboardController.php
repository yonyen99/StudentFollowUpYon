<?php

namespace App\Http\Controllers\Admin;
// use app\Student;
use App\Student;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $students = Student::all();
        $totalStudents = Student::all()->count();
        $MaleOfStudents = Student::all()->where('gender','Male')->count();
        $FemaleOfStudents = Student::all()->where('gender','Female')->count();
        $followUpList = Student::where('status',1)->count();
        $archiveList = Student::where('status',2)->count();
        $totalUsers = User::all()->count();
        
        return view('admin.dashboard')
        ->with(array(
            'students' => $students,
            'totalStudents' => $totalStudents,
            'totalUsers' =>$totalUsers,
            'MaleOfStudents' =>$MaleOfStudents,
            'FemaleOfStudents' =>$FemaleOfStudents,
            'followUpList' =>$followUpList,
            'archiveList'=>$archiveList
            ));
    }
    
}
