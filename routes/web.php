<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

    Auth::routes();
   
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    
    Route::resource('student','StudentController');
    // route to followUp
    Route::get('/followUp{id}','StudentController@followUp')->name('followUp');
    // route to achive
    Route::get('/achive{id}','StudentController@achive')->name('achive');
    //resource controller comment
    Route::resource('/comment','commentController');
    // route for viewdetailcomment
    Route::get('/viewdetailcomment{id}','commentController@comment')->name('comment');
    //route resource controller 
    Route::get('/viewFollowUpList','StudentController@viewFollowUpList')->name('viewFollowUpList');
    // route to viewAchiveList
    Route::get('/viewAchiveList','StudentController@viewAchiveList')->name('viewAchiveList');
    //route resource controller 
    Route::resource('/user','UserController');
    // show the page add of users
    Route::get('showPageAddTutor\{id}', 'UserController@showPageAddTutor')->name('showPageAddTutor');
    //assign tutor to student
    Route::PUT('addTutorToStudent\{IdOfUser}\{IdOfStudent}','StudentController@addTutorToStudent')->name('addTutorToStudent');
    // route to add comment
    Route::post('/add{id}','commentController@addComment')->name('addComment');
    //route admin control the student
    Route::get('/tutorcontrol','StudentController@tutorMentorStudents')->name('tutorControlStudents');
    //route changePhotoTutor
    Route::put('/changePhotoTutor','UserController@changePhotoTutor')->name('changePhotoTutor');
    //route for delete comment.
    Route::delete('/destroyComment{id}','commentController@destroyComment')->name('destroyComment');
    //route for edit comment.
    Route::patch('/editComment{id}','commentController@editComment')->name('editComment');
     //route admin control the student of each tutor;
     Route::get('/mentorStudentsSpecificOfTutors{id}','StudentController@mentorStudentsSpecificOfTutors')->name('mentorStudentsSpecificOfTutors');
     //route admin view specific comment that tutor commented
     Route::get('/ viewSpecificthatTutorsComment{id}','StudentController@viewSpecificthatTutorsComment')->name(' viewSpecificthatTutorsComment');

     
    
});
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('student','StudentController');
    // route for viewdetailcomment
     Route::get('/viewdetailcomment{id}','commentController@comment')->name('comment');
      // route to viewFollowUpList
      Route::get('/viewFollowUpList','StudentController@viewFollowUpList')->name('viewFollowUpList');
      // route to viewAchiveList
      Route::get('/viewAchiveList','StudentController@viewAchiveList')->name('viewAchiveList');
     //resource controller comment
     Route::resource('/comment','commentController');
     // route for viewdetailcomment
     Route::get('/viewdetailcomment{id}','commentController@comment')->name('comment');
     // route to add comment
    Route::post('/add{id}','commentController@addComment')->name('addComment');
    //route author control the student
    Route::get('/tutorcontrol','StudentController@tutorMentorStudents')->name('tutorControlStudents');
    Route::resource('/user','UserController');
    //route changePhotoTutor
    Route::put('/changePhotoTutor','UserController@changePhotoTutor')->name('changePhotoTutor');
    //route for delete comment.
    Route::delete('/destroyComment{id}','commentController@destroyComment')->name('destroyComment');
    //route for edit comment.
    Route::patch('/editComment{id}','commentController@editComment')->name('editComment');
    //route admin view specific comment that tutor commented
    Route::get('/viewSpecificthatTutorsComment{id}','StudentController@viewSpecificthatTutorsComment')->name('viewSpecificthatTutorsComment');
    //route admin control the student of each tutor;
    Route::get('/mentorStudentsSpecificOfTutors{id}','StudentController@mentorStudentsSpecificOfTutors')->name('mentorStudentsSpecificOfTutors');

});


