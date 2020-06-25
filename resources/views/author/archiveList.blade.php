@include('interface.interface')
<div class="main-panel">
    <div class="content">
         <div class="container-fluid">
          <h3 class="text-center">Student achive List</h3>
        
          
        
            <div class="table-responsive">
              <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Profile</th>
                      <th class="th-sm">Name</th>
                      <th class="th-sm">Gender</th>
                      <th class="th-sm">Class</th>
                    
                    <th class="th-sm">Status</th>
                  
                    <th class="th-sm">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students  as $student)
                        <tr>
                            
                          <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                            <td>{{$student->first_name." ".$student->last_name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->class}}</td>
                            
                           
                            <td>
                              @if ($student->status == 2)
                              <p class="text-success"> achive</p>
                            
                     @endif
                     @if ($student->status == 1)
                     <p class="text-danger">follow up</p>
                             
                      @endif
                     </td>
                          
                            
                            

                            <td>

                               
                                               
                 
                 
                                                 <a data-toggle="modal" data-target="#myModal{{$student->id}}" href=""><span class="material-icons green">visibility</span></a>
                                                 <!-- Modal -->
                                                 <div class="modal fade" id="myModal{{$student->id}}" role="dialog"  data-toggle="modal" data-target="#myModal{{$student->id}}">
                                                   <div class="modal-dialog">
                                                   
                                                     <!-- Modal content-->
                                                     <div class="modal-content">
                                                       <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        
                                                         
                                                       </div>
                                                       <div class="modal-body">
                                                         <div class="card-header p-4 ">
                                                             <div class="row d-flex justify-content-center">
                                                                 <div class="container-image">
                                                                     <img class="mx-auto d-block" src="{{asset('img_student/'.$student->picture)}}" width="105" style="border-radius: 105px;" height="105" alt="Avatar">
                                                        
                 
                                                                 </div>
                                                             </div>
                                                               <hr>
                                                               <div class="row d-flex justify-content-between">
                                                                 <p> <strong>First Name: </strong>{{$student['first_name']}} </p>
                                                                 <p><strong>Last Name: </strong>{{$student['last_name']}}</p>
                                                               </div>
                                                               <div class="row d-flex justify-content-between">
                                                                 <p><strong>ID_Student: </strong>{{$student['student_id']}}</p>
                                                                 <p><strong>Class: </strong>{{$student['class']}}</p>
                                                               </div>
                                                               <div class="row d-flex justify-content-between">
                                                                 <p><strong>Province </strong>{{$student['province']}}</p>
                                                                 <p><strong>Gender: </strong>{{$student['gender']}}</p>  
                                                               </div>
                                                               <div class="row d-flex justify-content-between">
                                                                 <p><strong>Class </strong>{{$student['class']}}</p>
                                                                 <p><strong>year: </strong>{{$student['year']}}</p>  
                                                               </div>
                                                               <div class="row d-flex justify-content-between">
                                                                 <p>
                                                                  <strong>Status:</strong>
                                                                  @if ($student->status == 2)
                                                                   <strong class="text-info">Archive</strong> 
                                                              @endif
                                                              @if ($student->status == 1)
                                                                 <strong class="text-danger">Follow up</strong> 
                                                              @endif
                                                              @if ($student->status == 0)
                                                                 <strong class="text-info">Normal Student</strong> 
                                                              @endif
                                                                 </p>
                                                                 <p>
                                                                   <strong>Tutor_Name:</strong> 
                                                                   @if ($student->user_id == null)
                                                                   Not yet Tutor
                                                                   @else
                                                                   {{$student->user['first_name']}}.{{$student->user['last_name']}}
                                                                         
                                                                     @endif
                                                                 </p>
                                                               </div>
                                                         </div>
                                                     </div>
                 
                                                       <div class="modal-footer">
                                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                       </div>
                                                     </div> 
                                   

                            </td>
                        </tr>
                      
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Gender</th>
                    <th class="th-sm">Class</th>
                    <th class="th-sm">Profile</th>
                
                    <th class="th-sm">Status</th>
                    
                    <th class="th-sm">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
         </div>
    </div>
  </div>