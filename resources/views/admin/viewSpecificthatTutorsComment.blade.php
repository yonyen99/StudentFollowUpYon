@include('interface.interface')
<div class="main-panel">
    <div class="content">
         <div class="container-fluid">
          <h3 class="text-center">View Comment</h3>
        
          
        
            <div class="table-responsive">
              <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th class="th-sm">Profile</th>
                      <th class="th-sm">Student_Name</th>
                      <th class="th-sm">Comments</th>
                      <th class="th-sm">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $item)
                        <tr>
                            <td><img src="{{asset('img_student/'.$item->student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                            <td>{{$item->student->first_name." ".$item->student->last_name}}</td>
                            <td>{{$item->comment}}</td>
                            @if (Auth::id() == $item->user_id)
                        <td>
                           
                            <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#editcomment{{$item->id}}" href="#" href=""><span class="material-icons green">edit</span></a> 
                            <div class="modal fade modal-open" id="editcomment{{$item->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action= "{{route('admin.editComment',$item->id)}}">
                                            @csrf
                                            <input type="text" name="comment" id="" class="form-control" value="{{$item->comment}}">
                                        @method('patch')
                                        <br>
                                        <br>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                       
                                    </div>
                                  </div>
                                </div>
                              </div>  
                            <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#comment{{$item->id}}" href="#"><i class="material-icons red">delete</i></a>
                            <!-- Modal -->
                            <div class="modal fade modal-open" id="comment{{$item->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure delete?
                                  </div>
                                  <div class="modal-footer">
                                    <form method="POST" action= "{{route('admin.destroyComment',$item->id)}}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>  
                        </td>
                        @else
                        <td>
                            No permission
                        </td>
                        @endif
                           
                           
                        </tr>
                      
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-sm">Profile</th>
                      <th class="th-sm">Comments</th>
                      <th class="th-sm">TuTor_Name</th>
                      <th class="th-sm">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
         </div>
    </div>
  </div>