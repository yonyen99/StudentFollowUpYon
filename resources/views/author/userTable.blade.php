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
                          <a href="{{route('author.mentorStudentsSpecificOfTutors',$item->id)}}">view all Control</a> |
                          <a href="{{route('author.viewSpecificthatTutorsComment',$item->id)}}">View all comments</a>
                          

                        </td>
                        <td>
                            @if ($item->role->id == 1)
                                Admin
                            @else
                                <a href="">Delete</a>
                            
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