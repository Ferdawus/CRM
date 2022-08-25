
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
      <!-- Container-fluid starts-->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" id="success-color">
            <h5 id="title">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create User"> 
                    <i class="fa-solid fa-circle-plus mr-2"></i>
                    Add
                </button> 
                  Client List
            </h5>
          </div>
          <div class="">
            <table class="table table-responsive table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Client</th>
                  <th scope="col">ContactNumber</th>
                  <th scope="col">AltContactNumber</th>
                  <th scope="col">ReferredBy</th>
                  <th scope="col">District</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Address</th>
                  <th scope="col">OthersInformation</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                {{-- @foreach () --}}
                <tr>
                  
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                     
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="#" class="btn btn-pill btn-sm btn-outline-info btn-air-info">Edit</a>
                      <a href="#" class="btn btn-pill btn-sm btn-outline-secondary btn-air-secondary">Delete</a>
                    </td>
                 
                </tr>
                {{-- @endforeach --}}
                
              </tbody>
            </table>
          </div>

          {{-- insert modal --}}
          <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Add New User</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ Form::open(['url' => '/client','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="UserName">UserName:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" name="name" placeholder="type user name" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="Email">Email:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="email" name="email" placeholder="type user email" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="password">Password:</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" placeholder="type user password"  required="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="ConfirmPassword">Confirm   
                        Password:</label>
                      <div class="col-sm-9">  
                        <input class="form-control" type="password" name="password_confirmation" placeholder="type user password"  required="">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="Role">Role:</label>
                      <div class="col-sm-9">
                        <select class="form-select" id="validationCustom04" name="Role" required="">
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
                        <select class="form-select" id="validationCustom04" name="Status" required="">
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
      </div>
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
@endsection

@section('header')
   <script>
   
   </script>
@endsection
@section('footer')

@endsection