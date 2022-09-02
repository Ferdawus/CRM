
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
      <!-- Container-fluid starts-->
      <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
          <div class="card-header pb-0">
            <h5>All User && User Role Information</h5>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">

              <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i class="icofont icofont-users"></i>All User</a></li>

              <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i class="icofont icofont-user"></i>All Role</a></li>
              <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i class="icofont icofont-tick-boxed"></i>Role Assign</a></li>
            </ul>
            <div class="tab-content" id="top-tabContent">
              {{-- User All List And Add --}}
              <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                <div class="col-sm-12">
                  <div class="card">
                      <div class="card-header" id="success-color">
                        <h5 id="title">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create User"> 
                                <i class="fa-solid fa-circle-plus mr-2"></i>
                                Add
                            </button> 
                              User List
                        </h5>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                          
                            <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($Users as $User)
                            <tr>
                              
                                <td>{{$SL++}}</td>
                                <td>{{$User->name}}</td>
                                <td>{{$User->email}}</td>
                                <td>{{$User->Role}}</td>
                                <td>
                                  @if ($User->Status)
                                  <b class="text-success ">Active</b>      
                                  @else <b class="text-danger">Deactive</b>
                                  @endif
                                </td>
                                <td>
                                  {{-- <a href="#" class="btn btn-pill btn-sm btn-outline-info btn-air-info">Edit</a>
                                  <a href="/user/{{$User->id}}/delete" class="btn btn-pill btn-sm btn-outline-secondary btn-air-secondary">Delete</a> --}}
                                  <a href="" class=""><i class="icofont icofont-edit fs-5 text-secondary"></i></a>
                                  <a href="/user/{{$User->id}}/delete" class=""><i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i></a>
                                </td>
                            
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>

                      <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Add New User</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              {{ Form::open(['url' => '/user','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                                <div class="mb-3 row {{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label class="col-sm-3 col-form-label" for="UserName">UserName:</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" type="text" id="Name" name="name" placeholder="type user name">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="Email">Email:</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" type="email" id="Email" name="email" placeholder="type user email">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="password">Password:</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" type="password" id="Password" name="password" placeholder="type user password">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="ConfirmPassword">Confirm   
                                    Password:</label>
                                  <div class="col-sm-9">  
                                    <input class="form-control" type="password" id="ConPassword" name="password_confirmation" placeholder="type user password">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="Role">Role:</label>
                                  <div class="col-sm-9">
                                    <select class="form-select" id="validationCustom04" name="Role" id="Role">
                                      <option selected="" disabled="" value="">Choose...</option>
                                      <option>Admin</option>
                                      <option>User</option>
                                      <option>Author</option>
                                      <option>Others</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="Status">Status:</label>
                                  <div class="col-sm-9">
                                    <select class="form-select" id="validationCustom04" name="Status" id="Status">
                                      <option selected="" disabled="" value="">Choose...</option>
                                      <option value="1">Active</option>
                                      <option value="0">Deactive</option>
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" type="submit" id="formSubmit">Add New User</button>
                            </div>
                            {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                  </div>
                </div> 
              </div>

              {{-- User All Role And Role Add --}}
              <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                <div class="col-md-11 m-auto">
                  <div class="card">
                    <div class="card-header" id="success-color">
                      <h5 id="title">
                          <button type="button" data-bs-toggle="modal" data-bs-target="#role_add_btn" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create Role"> 
                              <i class="fa-solid fa-circle-plus mr-2"></i>
                              Add
                          </button> 
                            Role List
                      </h5>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-responsive table-hover table-striped">
                        <thead>
                          <tr>
                            {{-- <th scope="col">SL</th> --}}
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                  
                          @foreach ($Roles as $Role)
                            <tr>
                              {{-- <td>{{$SL++}}</td> --}}
                              <td>{{$Role->Role}}</td>
                              <td>{{$Role->Description}}</td>
                              <td class="d-flex">
                                <button style="border: 0px; backround:none;"  data-bs-toggle="modal" data-bs-target="#role_edit_btn" data-whatever="@mdo"   data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Role" class="RoleEditBtn" data-id="{{ $Role->id }}">
                                  <i class="icofont icofont-edit fs-5 text-secondary" ></i>
                                </button>

                                <a href="/role/{{$Role->id}}/delete" class="">
                                  <i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
          
                    {{-- insert modal --}}
                    <div class="modal fade" id="role_add_btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Add New Refer</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            {{ Form::open(['url' => '/roles','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                                <div class="mb-3">
                                  <label class="col-form-label" for="Role">Role Name:</label>
                                  <input class="form-control" type="text" name="Role"  required>
                                </div>
                                <div class="mb-3">
                                  <label class="col-form-label" for="Description">Description:</label>
                                  <textarea name="Description" class="form-control" id="" cols="10" rows="5"></textarea>
                                  
                                </div>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" type="submit">Add New Role</button>
                          </div>
                      
                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                    {{-- Edit Role modal --}}
                    <div class="modal fade" id="role_edit_btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Update Role</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            {{ Form::open(['url' => '/roles/update','method'=>'POST','id'=>'EditRoleForm', 'class'=>'theme-form','files'=> true]) }}
                                <input type="hidden" name="id" id="EditRoleId">
                                <div class="mb-3">
                                  <label class="col-form-label" for="Role">Role Name:</label>
                                  <input class="form-control" type="text" id="EditRole" name="Role"  required>
                                </div>
                                <div class="mb-3">
                                  <label class="col-form-label" for="Description">Description:</label>
                                  <textarea name="Description" class="form-control" id="EditDescription" cols="10" rows="5"></textarea>
                                  
                                </div>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" type="submit">Update Role</button>
                          </div>
                      
                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
          
          
          
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="col-sm-12">
        <div class="card">
          <div class="card-header" id="success-color">
            <h5 id="title">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create User"> 
                    <i class="fa-solid fa-circle-plus mr-2"></i>
                    Add
                </button> 
                  User List
            </h5>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
               
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Users as $User)
                <tr>
                  
                    <td>{{$SL++}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->email}}</td>
                    <td>{{$User->Role}}</td>
                    <td>
                      @if ($User->Status)
                      <b class="text-success ">Active</b>      
                      @else <b class="text-danger">Deactive</b>
                      @endif
                    </td>
                    <td>
                      <a href="#" class="btn btn-pill btn-sm btn-outline-info btn-air-info">Edit</a>
                      <a href="#" class="btn btn-pill btn-sm btn-outline-secondary btn-air-secondary">Delete</a>
                    </td>
                 
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>

          <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Add New User</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ Form::open(['url' => '/user','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="UserName">UserName:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" name="name" placeholder="type user name">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="Email">Email:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="email" name="email" placeholder="type user email">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="password">Password:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" placeholder="type user password" ="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="ConfirmPassword">Confirm   
                        Password:</label>
                      <div class="col-sm-9">  
                        <input class="form-control" type="password" name="password_confirmation" placeholder="type user password" ="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="Role">Role:</label>
                      <div class="col-sm-9">
                        <select class="form-select" id="validationCustom04" name="Role"="">
                          <option selected="" disabled="" value="">Choose...</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Author</option>
                          <option>Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="Status">Status:</label>
                      <div class="col-sm-9">
                        <select class="form-select" id="validationCustom04" name="Status"="">
                          <option selected="" disabled="" value="">Choose...</option>
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit">Add New User</button>
                </div>
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
      </div> --}}
  </div>
  <style>
    #success-color{
        background-color: #e3ebf2;
        padding: 8px  !important;
        border-radius: 3px !important; 
    }
    #title{
        /* color: white; */
        font-size: 18px;

    }
  </style>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.RoleEditBtn').on('click',function(e){
      e.preventDefault();
      var ID = $(this).attr('data-id');
      
      $.ajax({
        type: "GET",
        url: "/roles/edit/"+ID,
        data: $('#EditRoleForm').serialize(),
        dataType:'JSON',
        success: function (data) {
          $('#EditRoleId').attr('value',data.id);
          // const myData = JSON.parse(data);
         $('#EditRole').val(data.Role);
         $('#EditDescription').val(data.Description);
        }
      });
      
    });
  });
</script>
@endsection

@section('header')
   <script>
   
   </script>
@endsection
@section('footer')

@endsection