@include('interface.interface')
<div class="main-panel">
    <div class="content">
         <div class="container-fluid">
          <h3 class="text-center">Student information</h3>
            <div class="table-responsive">
              <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      
                    <th class="th-sm">Profile</th>
                    <th class="th-sm">Tutor_Name</th>
                    <th class="th-sm">Position</th>
                    <th class="th-sm">E-mail</th>
                    <th class="th-sm">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tutors as $tutor) 
                        <tr>
                            <td>
                                <img class="profile-image" src="{{asset('assets/img/'.$tutor->profile)}}" width="40" height="40" style="border-radius: 50%;" alt="User" />
                            </td>
                            <td>{{$tutor->first_name}}.{{$tutor->last_name}}</td>
                                <td>{{$tutor->position}}</td>
                                <td>{{$tutor->email}}</td>
                                <td>
                                   {{-- <a href="{{route('admin.addTutorToStudent',[$tutor->id,$student->id])}}">assign</a> --}}
                                   <form action="{{route('admin.addTutorToStudent',[$tutor->id,$student->id])}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary btn-sm">Assing</button>
                                  </form>
                                </td>
                            
                        </tr>
                      
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-sm">Profile</th>
                    <th class="th-sm">Tutor_Name</th>
                    <th class="th-sm">Position</th>
                    <th class="th-sm">E-mail</th>
                    <th class="th-sm">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
         </div>
    </div>
  </div>