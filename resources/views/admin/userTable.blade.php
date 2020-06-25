@include('interface.interface')
<div class="main-panel">
    <div class="content">
         <div class="container-fluid">
          <h3 class="text-center">Tutor information</h3>
        
          
        
            <div class="table-responsive">
              <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th class="th-sm">Profile</th>
                      <th class="th-sm">Tutor_Name</th>
                      <th class="th-sm">Postion</th>
                      <th class="th-sm">E-mail</th>
                      <th class="th-sm">Under mentor Student | Comment</th>
                      <th class="th-sm">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>
                            <img class="profile-image" src="{{asset('assets/img/'.$item-> profile)}}" width="40" height="40" style="border-radius: 50%;" alt="User" />
                        </td>
                        <td>{{$item->first_name}} {{$item->last_name}}</td>
                        <td>{{$item->position}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                          <a href="{{route('admin.mentorStudentsSpecificOfTutors',$item->id)}}">view all Control</a> |
                          <a href="{{route('admin. viewSpecificthatTutorsComment',$item->id)}}">View all comments</a>
                          

                        </td>
                        <td>
                            @if ($item->role->id == 1)
                                Admin
                            @else
                                {{-- <a href="{{route('admin.user.destroy',$item->id)}}">Delete</a> --}}
                                <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal{{$item->id}}" href="#"><i class="material-icons red">delete</i></a>
                                <!-- Modal -->
                                <div class="modal fade modal-open" id="exampleModal{{$item->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Are you sure want to delelte?
                                      </div>
                                      <div class="modal-footer">
                                        <form method="POST" action= "{{route('admin.user.destroy',$item->id)}}">
                                          @csrf
                                          @method('DELETE')
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>  
                            
                            @endif
                            
                        </td>
                    </tr>
                      
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-sm">Profile</th>
                    <th class="th-sm">Tutor_Name</th>
                    <th class="th-sm">Postion</th>
                    <th class="th-sm">E-mail</th>
                    <th class="th-sm">Under mentor Student | Comment</th>
                    <th class="th-sm">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
         </div>
    </div>
  </div>