
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
      <!-- Container-fluid starts-->
      <div class="col-md-11 m-auto">
        <div class="card">
          <div class="card-header" id="success-color">
            <h5 id="title">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create User"> 
                    <i class="fa-solid fa-circle-plus mr-2"></i>
                    Add
                </button> 
                  Referred List
            </h5>
          </div>
          <div class="table-responsive">
            <table class="table table-responsive table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>
        
                @foreach ($Referes as $Refer)
                  <tr>
                    <td>{{$SL++}}</td>
                    <td>{{$Refer->Name}}</td>
                    <td>{{$Refer->Description}}</td>
                    <td class="d-flex">
                      {{-- <a href=""><i class="icofont icofont-eye fs-5 me-2"></i></a> --}}
                      {{-- <a href="" class=""><i class="icofont icofont-edit fs-5 text-secondary"></i></a> --}}
                      <a href="/refer/{{$Refer->id}}/delete" class=""><i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i></a>
                    </td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>

          {{-- insert modal --}}
          <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Add New Refer</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ Form::open(['url' => '/refer','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                      <div class="mb-3">
                        <label class="col-form-label" for="Name">Name:</label>
                        <input class="form-control" type="text" name="Name"  required>
                      </div>
                      <div class="mb-3">
                        <label class="col-form-label" for="Description">Description:</label>
                        <textarea name="Description" class="form-control" id="" cols="10" rows="5"></textarea>
                        
                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add New Refered By</button>
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