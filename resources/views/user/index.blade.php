@php
    error_reporting(0);
@endphp
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
                            @foreach ($GetData as $Value)
                            <tr>

                                <td>{{$SL++}}</td>
                                <td>{{$Value->name}}</td>
                                <td>{{$Value->email}}</td>
                                <td>{{$Value->RoleName}}</td>
                                <td>
                                  @if ($Value->Status)
                                   <a href="{{ URL("/user/status/{$Value->id}/0") }}"><b class="text-success ">Active</b></a>
                                  @else
                                    <a href="{{ URL("/user/status/{$Value->id}/1") }}"> <b class="text-danger">Deactive</b></a>
                                  @endif
                                </td>
                                <td>

                                  <button style="border: 0px; backround:none;"  data-bs-toggle="modal" data-bs-target="#user_edit_btn" data-whatever="@mdo"   data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit User" class="UserEditBtn" data-id="{{ $Value->id }}" >
                                    <i class="icofont icofont-edit fs-5 text-secondary"></i>
                                  </button>
                                  <a href="/user/{{$Value->id}}/delete" class=""><i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i></a>
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
                                      @foreach ($Roles as $Role)
                                        <option value="{{ $Role->id }}">{{ $Role->Role }}</option>
                                      @endforeach
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

              {{-- Edit user modal --}}
              <div class="modal fade" id="user_edit_btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">Update Role</h5>
                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      {{ Form::open(['url' => '/user/update','method'=>'POST','id'=>'EditUserForm', 'class'=>'theme-form','files'=> true]) }}
                        <input type="hidden" name="id" id="EditUserId">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="UserName">UserName:</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" id="EditName" name="name" placeholder="type user name">
                          </div>
                        </div>

                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="Email">Email:</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="email" id="EditEmail" name="email" placeholder="type user email">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="password">Password:</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="password" id="EditPassword" name="password" placeholder="type user password">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="ConfirmPassword">Confirm
                          Password:</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="password" id="EditConPassword" name="password_confirmation" placeholder="type user password">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="Role">Role:</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="validationCustom04" name="Role" id="EditRole">
                            <option selected="" disabled="" value="">Choose...</option>
                            @foreach ($Roles as $Role)
                              <option value="{{$Role->Role}}" selected>{{$Role->Role}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      {{-- <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="Status">Status:</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="validationCustom04" name="Status" id="EditStatus">
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                          </select>
                        </div>
                      </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update Role</button>
                    </div>

                    {{ Form::close() }}
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

                                <a href="/roles/{{$Role->id}}/delete" class="">
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

            {{-- Role Manage --}}
              <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                <div class="card">
                  <div class="card-header">
                    <div class="card-body">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Menu</th>
                            <th scope="col">View</th>
                            <th scope="col">Create</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{ Form::open(['url' => '/role/asign','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                            {{-- Client --}}
                            <?php
                              $getClientData = DB::table('roleasigns')->where('Menu', 'client')->first(['View', 'Create', 'Edit', 'Delete']);
                            ?>
                            <tr>
                              <th scope="row">Client</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[client]" value="0" />
                                  <input id="ClientView" name="view[client]" value="1" type="checkbox" @if($getClientData->View) checked @endif >
                                  <label for="ClientView">checked</label>
                                </div>
                              </td>
                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'client')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[client]" value="0" />
                                  <input id="ClientCreate" name="create[client]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="ClientCreate">checked</label>
                                </div>
                              </td>
                              <?php
                                $getEditData = DB::table('roleasigns')->where('Menu', 'client')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[client]" value="0">
                                  <input id="ClientEdit" name="edit[client]" value="1" type="checkbox" @if($getEditData->Edit) checked @endif>
                                  <label for="ClientEdit">checked</label>
                                </div>
                              </td>
                              <?php
                                $getDeleteData = DB::table('roleasigns')->where('Menu', 'client')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[client]" value="0">
                                  <input id="ClientDelete" name="delete[client]" value="1" type="checkbox" @if($getDeleteData->Delete) checked @endif>
                                  <label for="ClientDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- Product --}}
                            <?php
                              $getProductData = DB::table('roleasigns')->where('Menu', 'product')->first(['View', 'Create', 'Edit', 'Delete']);
                              // var_dump($getProductData);
                            ?>
                            <tr>
                              <th scope="row">Product</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[product]" value="0" />
                                  <input id="ProductView" name="view[product]" value="1" type="checkbox" @if($getProductData->View) checked @endif >
                                  <label for="ProductView">checked</label>
                                </div>
                              </td>

                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'product')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[product]" value="0">
                                  <input id="ProductCreate" name="create[product]"  value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="ProductCreate">checked</label>
                                </div>
                              </td>
                              <?php
                                $getEditData = DB::table('roleasigns')->where('Menu', 'product')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[product]" value="0">
                                  <input id="ProductEdit" name="edit[product]" value="1" type="checkbox" @if($getEditData->Edit) checked @endif>
                                  <label for="ProductEdit">checked</label>
                                </div>
                              </td>
                              <?php
                                $getDeleteData = DB::table('roleasigns')->where('Menu', 'product')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[product]" value="0">
                                  <input id="ProductDelete" name="delete[product]" value="1" type="checkbox" @if($getDeleteData->Delete) checked @endif>
                                  <label for="ProductDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- SLA --}}
                            @php
                              $getSLAData = DB::table('roleasigns')->where('Menu', 'sla')->first(['View', 'Create', 'Edit', 'Delete']);
                              // var_dump($getSLAData);
                            @endphp
                            <tr>
                              <th scope="row">SLA</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[sla]" value="0" id="">
                                  <input id="SLA_View" name="view[sla]"  type="checkbox" @if ($getSLAData->View) checked @endif>
                                  <label for="SLA_View">checked</label>
                                </div>
                              </td>

                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'sla')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[sla]" value="0">
                                  <input id="SLA_Create"  type="checkbox" name="create[sla]" value="1" @if($getCreateData->Create) checked @endif>
                                  <label for="SLA_Create">checked</label>
                                </div>
                              </td>
                              <?php
                                $getEditData = DB::table('roleasigns')->where('Menu', 'sla')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[sla]" value="0">
                                  <input id="SLA_Edit" name="edit[sla]" value="1"  type="checkbox" @if($getEditData->Edit) checked @endif>
                                  <label for="SLA_Edit">checked</label>
                                </div>
                              </td>
                              <?php
                                $getDeleteData = DB::table('roleasigns')->where('Menu', 'sla')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[sla]" value="0">
                                  <input id="SLA_Delete"  name="delete[sla]" value="1" type="checkbox" @if($getDeleteData->Delete) checked @endif>
                                  <label for="SLA_Delete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- INVOICE --}}
                            @php
                              $getInvoiceData = DB::table('roleasigns')->where('Menu','invoice')->first(['View','Create','Edit','Delete']);
                            @endphp
                            <tr>
                              <th scope="row">Invoice</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[invoice]" value="0">
                                  <input id="InvoiceView" name="view[invoice]" value="1" type="checkbox" @if($getInvoiceData->View) checked @endif >
                                  <label for="InvoiceView">checked</label>
                                </div>
                              </td>

                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'invoice')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[invoice]" value="0" />
                                  <input id="InvoiceCreate" name="create[invoice]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="InvoiceCreate">checked</label>
                                </div>
                              </td>
                              <?php
                                $getEditData = DB::table('roleasigns')->where('Menu', 'invoice')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[invoice]" value="0" />
                                  <input id="InvoiceEdit" name="edit[invoice]" vlaue="1" type="checkbox" @if($getEditData->Edit) checked @endif>
                                  <label for="InvoiceEdit">checked</label>
                                </div>
                              </td>
                              <?php
                                $getDeleteData = DB::table('roleasigns')->where('Menu', 'invoice')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[invoice]" value="0" />
                                  <input id="InvoiceDelete" name="delete[invoice]" value="1"  type="checkbox"  @if($getDeleteData->Delete) checked @endif>
                                  <label for="InvoiceDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- Report --}}
                            @php
                              $getReportData = DB::table('roleasigns')->where('Menu','report')->first(['View','Create','Edit','Delete']);
                            @endphp
                            <tr>
                              <th scope="row">Report</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[report]" value="0" />
                                  <input id="ReportView" name="view[report]" value="1" type="checkbox" @if($getReportData->View) checked @endif >
                                  <label for="ReportView">checked</label>
                                </div>
                              </td>

                              <?php
                              $getCreateData = DB::table('roleasigns')->where('Menu', 'report')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[report]" value="0">
                                  <input id="ReportCreate" name="create[report]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="ReportCreate">checked</label>
                                </div>
                              </td>
                              <?php
                                $getEditData = DB::table('roleasigns')->where('Menu', 'report')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[report]" value="0" />
                                  <input id="ReportEdit"  name="edit[report]" value="1"  type="checkbox" @if($getEditData->Edit) checked @endif>
                                  <label for="ReportEdit">checked</label>
                                </div>
                              </td>
                              <?php
                                $getDeleteData = DB::table('roleasigns')->where('Menu', 'report')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[report]" value="0" />
                                  <input id="ReportDelete"  name="delete[report]" value="1"  type="checkbox"  @if($getDeleteData->Delete) checked @endif>
                                  <label for="ReportDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- Service --}}

                            @php
                              $getServiceData = DB::table('roleasigns')->where('Menu','service')->first(['View','Create','Edit','Delete']);
                            @endphp
                            <tr>
                              <th scope="row">Service</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[service]" value="0" />
                                  <input id="ServiceView" name="view[service]" value="1" type="checkbox"  @if($getServiceData->View)checked @endif />
                                  <label for="ServiceView">checked</label>
                                </div>
                              </td>

                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'service')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[service]" value="0">
                                  <input id="ServiceCreate" name="create[service]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="ServiceCreate">checked</label>
                                </div>
                              </td>
                              <?php
                                $getEditData = DB::table('roleasigns')->where('Menu', 'service')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[service]" value="0" />
                                  <input id="ServiceEdit"  type="checkbox"  name="edit[service]" value="1" @if($getEditData->Edit) checked @endif>
                                  <label for="ServiceEdit">checked</label>
                                </div>
                              </td>
                              <td>
                                <?php
                                  $getDeleteData = DB::table('roleasigns')->where('Menu', 'service')->first(['View', 'Create', 'Edit', 'Delete']);
                                ?>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[service]" value="0" />
                                  <input id="ServiceDelete" type="checkbox"  name="delete[service]" value="1"  @if($getDeleteData->Delete) checked @endif>
                                  <label for="ServiceDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- SMS --}}
                            @php
                                $GetSmsData = DB::table('roleasigns')->where('Menu','sms')->first(['View','Create','Edit','Delete']);
                            @endphp
                            <tr>
                              <th scope="row">SMS</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[sms]" value="0" />
                                  <input id="SMS_View" name="view[sms]" value="1" type="checkbox" @if($GetSmsData->View)checked @endif>
                                  <label for="SMS_View">checked</label>
                                </div>
                              </td>

                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'sms')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[sms]" value="0">
                                  <input id="SMS_Create" name="create[sms]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="SMS_Create">checked</label>
                                </div>
                              </td>
                              <?php
                               $getsmsData = DB::table('roleasigns')->where('Menu', 'sms')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[sms]" value="0">
                                  <input id="SMS_Edit"  type="checkbox"  name="edit[sms]" value="1" @if($getsmsData->Edit) checked @endif>
                                  <label for="SMS_Edit">checked</label>
                                </div>
                              </td>
                              <?php
                               $getCreateData = DB::table('roleasigns')->where('Menu', 'sms')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[sms]" value="0">
                                  <input id="SMS_Delete" type="checkbox" name="delete[sms]" value="1"  @if($getsmsData->Delete) checked @endif>
                                  <label for="SMS_Delete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- Refered By --}}
                            <?php
                              $getReferData = DB::table('roleasigns')->where('Menu', 'refer')->first(['View', 'Create', 'Edit', 'Delete']);
                            ?>
                            <tr>
                              <th scope="row">Refered By</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[refer]" value="0" />
                                  <input id="ReferView" name="view[refer]" value="1" type="checkbox" @if($getReferData->View)checked @endif />
                                  <label for="ReferView">checked</label>
                                </div>
                              </td>


                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'refer')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[refer]" value="0">
                                  <input id="ReferCreate" name="create[refer]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="ReferCreate">checked</label>
                                </div>
                              </td>
                              <?php
                                $getReferData = DB::table('roleasigns')->where('Menu', 'refer')->first(['View', 'Create', 'Edit', 'Delete']);
                               ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[refer]" value="0">
                                  <input id="ReferEdit"  type="checkbox" name="edit[refer]" value="1"  @if($getReferData->Edit) checked @endif>
                                  <label for="ReferEdit">checked</label>
                                </div>
                              </td>
                              <?php
                                $getReferData = DB::table('roleasigns')->where('Menu', 'refer')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[refer]" value="0">
                                  <input id="ReferDelete" type="checkbox" name="delete[refer]" value="1" @if($getReferData->Delete) checked @endif>
                                  <label for="ReferDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                            {{-- hosted --}}
                            @php
                              $GetHostData = DB::table('roleasigns')->where('Menu','host')->first(['View','Create','Edit','Delete']);
                            @endphp
                            <tr>
                              <th scope="row">Hosted By</th>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="view[host]" value="0">
                                  <input id="HostView" type="checkbox" value="1" name="view[host]" value="1" @if($GetHostData->View)checked @endif>
                                  <label for="HostView">checked</label>
                                </div>
                              </td>

                              <?php
                                $getCreateData = DB::table('roleasigns')->where('Menu', 'host')->first(['View', 'Create', 'Edit', 'Delete']);
                              ?>
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="create[host]" value="0">
                                  <input id="HostCreate" name="create[host]" value="1" type="checkbox" @if($getCreateData->Create) checked @endif>
                                  <label for="HostCreate">checked</label>
                                </div>
                              </td>
                              @php
                                $GetHostData = DB::table('roleasigns')->where('Menu','host')->first(['View','Create','Edit','Delete']);
                              @endphp
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="edit[host]" value="0">
                                  <input id="HostEdit" type="checkbox"  name="edit[host]" value="1" @if($GetHostData->Edit) checked @endif>
                                  <label for="HostEdit">checked</label>
                                </div>
                              </td>
                              @php
                                $GetHostData = DB::table('roleasigns')->where('Menu','host')->first(['View','Create','Edit','Delete']);
                              @endphp
                              <td>
                                <div class="checkbox checkbox-dark m-squar">
                                  <input type="hidden" name="delete[host]" value="0">
                                  <input id="HostDelete" type="checkbox" name="delete[host]" value="1" @if($GetHostData->Delete) checked @endif>
                                  <label for="HostDelete">checked</label>
                                </div>
                              </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    {{ Form::close() }}

                  </div>
                </div>
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
    $('.UserEditBtn').on('click',function(e){
      e.preventDefault();

      var ID = $(this).attr('data-id');
      $.ajax({
        type: "GET",
        url: "/user/edit/"+ID,
        data: $('#EditUserForm').serialize(),
        dataType:'JSON',
        success: function (data) {
          console.log(data);
          $('#EditUserId').attr('value',data.id);
          // const myData = JSON.parse(data);
         $('#EditName').val(data.name);
         $('#EditEmail').val(data.email);
         $('#EditPassword').val(data.password);
         $('#EditConPassword').val(data.password);
         $('#EditRole').val(data.Role);
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
