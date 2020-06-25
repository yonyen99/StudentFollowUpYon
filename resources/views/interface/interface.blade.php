<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Follow up | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  </head>

{{-- //Admin --}}
  @if (Auth::user()->role->id == 1)
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Student Follow up </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../assets/img/{{Auth::user()->profile}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->


            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>{{Auth::user()->role->role_name}}</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('admin.dashboard')}}"><span class="material-icons">dashboard</span> Admin Dashboard</a>
                  <li><a><i class="material-icons">people</i>  Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.viewFollowUpList')}}">Follow up list</a></li>
                      <li><a href="{{route('admin.viewAchiveList')}}">Achive list</a></li>
                      
                    </ul>
                  </li>
                  
                  <li><a><span class="material-icons"> supervised_user_circle </span> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.user.store')}}">Show the tutors</a></li>
                      <li><a href="{{route('admin.tutorControlStudents')}}">Tutor control studedent</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-placement="top" title="Logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="../assets/img/{{Auth::user()->profile}}" alt="">{{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      {{-- <a class="dropdown-item"  href="javascript:;"> Profile</a> --}}
                      <form class="dropdown-item" action="{{route('admin.changePhotoTutor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <input id="file" type="file" name="picture">
                          <button id="btnsubmit" class="btn mt-2 btn-primary btn-sm btn-block" type="submit">Update Profile</button>
                        </div>
                      </form>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: inline-block;" >
            <div class="tile_count">
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
               <a href="{{route('admin.user.store')}}"> <div class="count green">{{$totalUsers}}</div></a>

             
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Students</span>
               <a href="{{route('admin.dashboard')}}"> <div class="count green">{{$totalStudents}}</div></a>
               {{-- <a href="{{route('admin.student.create')}}"><span class="count_bottom"><i class="purple"><i class="fa fa-sort-asc"></i><strong>Add more</strong></i></span></a> --}}
               

               <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#addStudent" href="#" href=""><i class="material-icons info">add</i></a>
               
                                  <div class="modal fade modal-open" id="addStudent" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            

                                            <form method="POST" action="{{route('admin.student.store')}}" enctype="multipart/form-data">
                                              @csrf
                                              @method('POST')
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">First Name</label>
                                                  <input type="text" class="form-control" id="inputName" placeholder="First Name"  name="first_name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Last Name</label>
                                                  <input type="text" class="form-control" id="inputlastname" placeholder="Last Name" name="last_name">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                
                                                {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
                                                <input type="radio" id="male" name="gender" value="Male" checked > Male
                                                <input type="radio" id="female" name="gender" value="Female"> Female
                                              </div>
                                              <div class="form-group">
                                                
                                                <label for="province">Province</label>
                                                <input type="text" class="form-control" id="province" placeholder="Province" name="province">
                                              </div>
                                              <div class="form-group">
                                                
                                                <label for="Class">Class</label>
                                                <select   name="class" class="form-control">
                                                  <option selected>Choose the class...</option>
                                                  <option value="WEP2020A">WEP2020A</option>
                                                  <option value="WEP2020B">WEP2020B</option>
                                                  <option value="SNA2020">SNA2020</option>
                                                  <option value="CLASS2021A">CLASS2021A</option>
                                                  <option value="CLASS2021B">CLASS2021B</option>
                                                  <option value="CLASS2021C">CLASS2021C</option>
                            
                                                </select>
                                              </div>
                                             
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState">Student_id</label>
                                                  <input type="text" class="form-control" id="inputCity" name="student_id" placeholder="student id...">
                                                
                                                </div>
                                              
                                                <div class="form-group col-md-6">
                                                 
                                                  <label  for="Year">Year</label>
                                                  <select class="form-control" name="year">
                                                    <option selected>Choose the year...</option>
                                                    <option value="First Year">First Year</option>
                                                    <option value="Secod Year">Secod Year</option>
                                                   
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleFormControlFile1">Picture</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="picture">
                                              </div>
                                              <button type="submit" class="btn btn-primary">Sign in</button>
                                            </form>
                                            
                                          </div>
                                          <div class="modal-footer">
                                             
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Females Student</span>
                <div class="count green">{{$FemaleOfStudents}}</div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Males of Student</span>
                <div class="count green">{{$MaleOfStudents}}</div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Follow up List</span>
      
                <a href="{{route('admin.viewFollowUpList')}}"><div class="count red">{{$followUpList}}</div></a>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Archive list</span>
                
                <a href="{{route('admin.viewAchiveList')}}"><div class="count purple">{{$archiveList}}</div></a>

              </div>
            </div>
          </div>
            <!-- /top tiles -->
  
          
  @else
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Student Follow up </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../assets/img/{{Auth::user()->profile}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->


            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>{{Auth::user()->role->role_name}}</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('author.dashboard')}}"><span class="material-icons">dashboard</span> Author Dashboard</a>
                  <li><a><i class="material-icons">people</i>  Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('author.viewFollowUpList')}}">Follow up list</a></li>
                      <li><a href="{{route('author.viewAchiveList')}}">Achive list</a></li>
                      
                    </ul>
                  </li>
                  
                  <li><a><span class="material-icons"> supervised_user_circle </span> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('author.user.store')}}">Show the tutors</a></li>
                      <li><a href="{{route('author.tutorControlStudents')}}">Student mentors</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-placement="top" title="Logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="../assets/img/{{Auth::user()->profile}}" alt="">{{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      {{-- <a class="dropdown-item"  href="javascript:;"> Profile</a> --}}
                      <form class="dropdown-item" action="{{route('author.changePhotoTutor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <input id="file" type="file" name="picture">
                          <button id="btnsubmit" class="btn mt-2 btn-primary btn-sm btn-block" type="submit">Update Profile</button>
                        </div>
                      </form>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: inline-block;" >
            <div class="tile_count">
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>

               <a href="{{route('author.user.store')}}"> <div class="count green">{{$totalUsers}}</div></a>


               
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Students</span>
               <a href="{{route('author.dashboard')}}"> <div class="count green">{{$totalStudents}}</div></a>
              
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Females Student</span>
                <div class="count green">{{$FemaleOfStudents}}</div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Males of Student</span>
                <div class="count green">{{$MaleOfStudents}}</div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Follow up List</span>
      
                <a href="{{route('author.viewFollowUpList')}}"><div class="count red">{{$followUpList}}</div></a>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Archive list</span>
                
                <a href="{{route('author.viewAchiveList')}}"><div class="count purple">{{$archiveList}}</div></a>

              </div>
            </div>
          </div>
            <!-- /top tiles -->


          
  @endif

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
        $('#example').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });
    });
</script>
{{-- jQuery --}}