
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
          <div class="table-responsive">
            <table class="table table-responsive table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Client</th>
                  <th scope="col">ContactNumber</th>
                  {{-- <th scope="col">AltnativeContact</th> --}}
                  <th scope="col">Country</th>
                  <th scope="col">Division</th>
                  <th scope="col">District</th>
                  <th scope="col">Referred By</th>
                  {{-- <th scope="col">Photo</th> --}}
                
                  {{-- <th scope="col">OthersInf</th> --}}
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($Clients as $Client)
                  <tr>
                    <td>{{$SL++}}</td>
                    <td><a href="#"> {{ $Client->Client }}</a></td>
                    <td>{{ $Client->ContactNumber }}</td>
                    {{-- <td>{{ $Client->AltnativeContact }}</td> --}}
                    <td>{{ $Client->Country }}</td>
                    <td>{{ $Client->Division}}</td>
                    <td>{{ $Client->District }}</td>
                    <td>{{ $Client->RefrredBy }}</td>
                    {{-- <td>{{ $Client->Photo }}</td> --}}
                   
                    {{-- <td>{{ $Client->OthersInf}}</td> --}}
                    <td class="d-flex">
                      <a href=""><i class="icofont icofont-eye fs-5 me-2"></i></a>
                      <a href="/client/edit/{{$Client->id}}" class=""><i class="icofont icofont-edit fs-5 text-secondary"></i></a>
                      
                      <a href="/client/{{$Client->id}}/delete" class=""><i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i></a>
                     
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
                  <h5 class="modal-title" id="exampleModalLabel2">Add New Client</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ Form::open(['url' => '/client','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="Client">Client Name:</label>
                        <input class="form-control" type="text" name="Client"  required>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="ContactNumber">Contact Number:</label>
                        <input class="form-control" type="text" name="ContactNumber"  required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="AltnativeContact">Altnative Contact:</label>
                        <input class="form-control" type="text" name="AltnativeContact">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="Country">Country:</label>
                        <input class="form-control" type="text" name="Country" value="Bangladesh"  required>
                        {{-- <select name="Country" class="form-select" id="">
                          <option value="" selected>Choose Country....</option>
                          @foreach ($Countries as $Country)
                          
                          <option value="{{$Country->name}}">{{$Country->id}}. {{$Country->name}}</option>
                          @endforeach
                          
                        </select> --}}
                      </div>
                    </div>

                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="Division">Division:</label>
                        
                        <select name="Division" class="form-select" id="" required>
                          <option value="" selected>Choose Division....</option>
                          @foreach ($Divisions as $Division)
                          
                          <option value="{{$Division->name}}">{{$Division->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="District">District:</label>
                        
                        <select name="District" class="form-select" id="" required>
                          <option value="" selected>Choose District....</option>
                          @foreach ($Districts as $District)
                          
                          <option value="{{$District->name}}">{{$District->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                     
                    </div>
                    
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="RefrredBy">Referred By:</label>
                        
                        <select name="RefrredBy" class="form-select" id="" required>
                          <option value="" selected>Choose Referred ....</option>
                          @foreach ($Referreds as $Referred)
                          
                          <option value="{{$Referred->Name}}"> {{$Referred->Name}} </option>
                          @endforeach
                          
                        </select>
                      </div>
                    
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="Address">Address:</label>
                        <input class="form-control" type="text" name="Address">
                      </div>
                    </div>
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="Photo">Photo:</label>
                        <input class="form-control" type="file" name="Photo" >
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="col-form-label" for="OthersInf">OthersInf:</label>
                        <input  type="text" name="OthersInf" class="form-control"  placeholder="type others information">
                        {{-- <textarea name="OthersInf" class="form-control" id="" cols="30" rows="10" placeholder="type others information"></textarea> --}}
  
                      </div>  
                    </div>
                   
                   
                  </div>
                
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit">Add New Client</button>
                </div>
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