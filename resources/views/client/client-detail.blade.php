
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
    <div class="container mt-5">
        <div class="row d-flex ">
            <div class="col-md-5 box-shadow">
                <div class="card p-3 py-4">
                    <div class="text-center">
                        <img class="img-90 rounded-circle" src="http://127.0.0.1:8000/assets/images/dashboard/1.png" alt="">
                    </div>
                    
                    <div class="text-center mt-3">
                        {{-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> --}}
                        <h5 class="mt-2 mb-0 py-2">{{$ClientDetails->Client}}</h5>
                        <div class="px-4 mt-1" class="">
                            <b class="mt-2 mb-0">Phone:</b>
                            <span>{{$ClientDetails->ContactNumber}}</span>
                        </div>
                        <div class="px-4 mt-1 mb-2">
                            <b class="mt-2 mb-0">Address:</b>
                            <span>{{$ClientDetails->Address}}</span>
                        </div>
                         <ul class="social-list">
                            <li><i class="icofont icofont-social-facebook"></i></li>
                            <li><i class="icofont icofont-social-twitter"></i></li>
                            <li><i class="icofont icofont-social-dribbble"></i></li>
                            <li><i class="icofont icofont-social-linkedin"></i></li>
                            <li><i class="icofont icofont-social-google-plus"></i></li>
                        </ul>
                        <div class="buttons">
                            <button class="btn btn-outline-primary px-4" data-bs-toggle="modal" data-bs-target="#client_details_modal">Add Service</button>
                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                        </div>

                        
                        <div class="modal fade" id="client_details_modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    {{ Form::open(['url'=>'','method'=>'POST','files'=>true])}}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Service</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                          
                                            <fieldset>
                                                <legend> Bussiness-Information</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label text-left" for="Client">Client Name:</label>
                                                            <input class="form-control" type="text" name="Client"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="Client">Client Name:</label>
                                                            <input class="form-control" type="text" name="Client" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend> Payment-Information</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label text-left" for="Client">Client Name:</label>
                                                            <input class="form-control" type="text" name="Client"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="Client">Client Name:</label>
                                                            <input class="form-control" type="text" name="Client" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend> Product-Information</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label text-left" for="Client">Client Name:</label>
                                                            <input class="form-control" type="text" name="Client"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="Client">Client Name:</label>
                                                            <input class="form-control" type="text" name="Client" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                              
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Add New Service</button>
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    </div>

    <style>

        body{
             background:#eee;
        }
        /* .box-shadow{
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        } */
        .card{
            border:none;

            position:relative;
            overflow:hidden;
            border-radius:8px;
            cursor:pointer;
        }

        .card:before{
            
            content:"";
            position:absolute;
            left:0;
            top:0;
            width:4px;
            height:100%;
            background-color:#3bd39d;
            transform:scaleY(1);
            transition:all 0.5s;
            transform-origin: bottom
        }

        .card:after{
            
            content:"";
            position:absolute;
            left:0;
            top:0;
            width:4px;
            height:100%;
            background-color:#308b7a;
            transform:scaleY(0);
            transition:all 0.5s;
            transform-origin: bottom
        }

        .card:hover::after{
            transform:scaleY(1);
        }
        .fonts{
            font-size:11px;
        }

        .social-list{
            display:flex;
            list-style:none;
            justify-content:center;
            padding:0;
        }

        .social-list li{
            padding:10px;
            color:#308b7a;
            font-size:19px;
        }


        .buttons button:nth-child(1){
            border:1px solid #308b7a !important;
            color:#308b7a;
            height:40px;
        }

        .buttons button:nth-child(1):hover{
            border:1px solid #308b7a !important;
            color:#fff;
            height:40px;
            background-color:#308b7a;
        }

        .buttons button:nth-child(2){
            border:1px solid #308b7a !important;
            background-color:#308b7a;
            color:#fff;
            height:40px;
        }
        fieldset {
            border: 2px solid green;
            /* margin: 10px;
            padding: 20px; */
            width: auto;
            padding: 0px 20px;
            /* font-family: courier; */
        }
        legend {
        float: inherit;
        width: inherit;
        padding: 0;
        margin-bottom: 0.5rem;
        font-size: calc(1.275rem + 0.3vw);
        line-height: inherit;
        margin: 0 -200px;
        }   
        legend {
            position: inherit;
        }
        .form-control, .form-select {
            background-color: #fff;
            font-size: 14px;
            border-color: #b2b4b4 !important;
            color: #a1a0a0;
        }
        
    </style>
         
@endsection

@section('header')
   <script>
   
   </script>
@endsection
@section('footer')