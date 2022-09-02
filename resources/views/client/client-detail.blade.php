
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
    <div class="container mt-5">
        <div class="row">

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

                        {{-- Service add --}}
                        <div class="modal fade" id="client_details_modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    {{ Form::open(['url'=>'/service/insert/'.$ClientDetails->id,'method'=>'POST','files'=>true])}}
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
                                                            <label class="col-form-label text-left" for="BussinessName">Bussiness Name:</label>
                                                            <input class="form-control" type="text" name="BussinessName"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="BussinessAddess">Bussiness Address:</label>
                                                            <input class="form-control" type="text" name="BussinessAddess" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="OtherBussinessAddess">Others Bussiness Address</label>
                                                            <textarea name="OtherBussinessAddess" type="text" class="form-control" id="" cols="70" rows="4"></textarea>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <legend> Payment-Information</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label text-left" for="SoftwarePrice">Software Price :</label>
                                                            <input class="form-control" type="number" name="SoftwarePrice"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="InstallationSerge">Installation Serge:</label>
                                                            <input class="form-control" type="number" name="InstallationSerge" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="SLAType">SLA Type:</label>
                                                            <select name="SLAType" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($SLAs as $SLA)
                                                                    <option value="{{ $SLA->id }}">
                                                                        {{ $SLA->Type }}</option>
                                                                @endforeach
                        
                                                            </select>
                                                            {{-- <input class="form-control" type="text" name="SLAType" required> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="SLAAmount">SLA Amount:</label>
                                                            <input class="form-control" type="number" name="SLAAmount" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="BillingType"> Domain&Hosting Billing Type:</label>
                                                            {{-- <input class="form-control" type="text" name="BillingType" required> --}}
                                                            <select name="BillingType" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($SLAs as $SLA)
                                                                    <option value="{{ $SLA->id }}">
                                                                        {{ $SLA->Type }}</option>
                                                                @endforeach
                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="BillingAmount"> Domain&Hosting Billing Amount:</label>
                                                            <input class="form-control" type="number" name="BillingAmount" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="BillingDate"> Domain&Hosting Billing Start Date:</label>
                                                            <input class="form-control" type="date" name="BillingDate" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <legend> Product-Information</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label text-left" for="ProductType">Product Type :</label>
                                                            {{-- <input class="form-control" type="text" name="ProductType"  required> --}}
                                                            <select name="ProductType" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($Products as $Product)
                                                                    <option value="{{ $Product->id }}">
                                                                        {{ $Product->ProductType }}</option>
                                                                @endforeach
                        
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="ProductInstallId">Product Install Id:</label>
                                                            <input class="form-control" type="number" name="ProductInstallId" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="ProductUrl">Product Url:</label>
                                                            <input class="form-control" type="text" name="ProductUrl" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="ProductUserName">Product UserName:</label>
                                                            <input class="form-control" type="text" name="ProductUserName" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="ProductPassword">Product Password:</label>
                                                            <input class="form-control" type="text" name="ProductPassword" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="ProductInstallDate">Product Install Date:</label>
                                                            <input class="form-control" type="date" name="ProductInstallDate" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="ProductRenewDate"> Product Renew Date:</label>
                                                            <input class="form-control" type="date" name="ProductRenewDate" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="RefrredBy">Refrred By:</label>
                                                            {{-- <input class="form-control" type="text" name="RefrredBy" required> --}}
                                                            <select name="RefrredBy" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($Refers as $Refer)
                                                                    <option value="{{ $Refer->id }}">
                                                                        {{ $Refer->Name }}</option>
                                                                @endforeach
                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="HostedBy">Hosted By:</label>
                                                            {{-- <input class="form-control" type="text" name="HostedBy" required> --}}
                                                            <select name="HostedBy" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($Hosts as $Host)
                                                                    <option value="{{ $Host->id }}">
                                                                        {{ $Host->HostedBy }}</option>
                                                                @endforeach
                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="DomainType">Domain Type:</label>
                                                            {{-- <input class="form-control" type="text" name="DomainType" required> --}}
                                                            <select name="DomainType" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($Domains as $Domain)
                                                                    <option value="{{ $Domain->id }}">
                                                                        {{ $Domain->Type }}</option>
                                                                @endforeach
                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label" for="DomainProvide">Domain Provide:</label>
                                                            {{-- <input class="form-control" type="text" name="DomainProvide" required> --}}
                                                            <select name="DomainProvide" class="form-select" id="">
                                                                <option value="" selected>Choose type....</option>
                                                                @foreach ($Domains as $Domain)
                                                                    <option value="{{ $Domain->id }}">
                                                                        {{ $Domain->Provide }}</option>
                                                                @endforeach
                        
                                                            </select>
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

           
            <div class="col-md-6">
               
                <div class="table-responsive">
                    <table class="table table-responsive table-hover table-striped table-bordered">
                        <thead>
                          
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Software Name</th>
                                <th scope="col">Next SLA Bill Date</th>
                                <th scope="col">SLA Current Bill Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Services as $Service)
                                <tr>
                                    <td>{{$SL++}}</td>
                                    <td>
                                        {{-- href="/service/client/product/{{ $Service->id }}" --}}
                                        <button style="border:0px; background:none;" data-bs-toggle="modal"
                                            data-bs-target="#client_service_show_modal" data-whatever="@mdo" class="ServiceShow"
                                            data-bs-original-title="" data-id="{{ $Service->id }}">
                                            {{ $Service->ProductType }}
                                        </button>
                                    </td>
                                    
                                    <td>
                                        
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="/client/per-service/{{ $Service->id }}/delete" class="">
                                            <i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

           
        
        </div>
         {{-- client service show --}}
         <div class="modal fade" id="client_service_show_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2"> Show All Client Per-Service</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{ Form::open(['url'=>'/service/client/product/update','method'=>'POST','files'=>true])}}
                        <input type="hidden" name="id" id="ClientServiceId">
                            <div class="row">
                                <div class="col-md-5">
                                    <fieldset class="p-3">
                                        <legend style="margin: 0!important"> Client-Information</legend>
                                        <h5 id="Client"></h5>
                                        
                                        <b>Phone:</b>
                                        <span id="ShowPhone"></span>
                                        <br>
                                        <b>Address:</b>
                                        <span id="ShowAddress"></span>
                                    </fieldset>
                                </div>
                                <div class="col-md-7">
                                    <fieldset>
                                        <legend style="margin: 0!important"> Bussiness-Information</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label text-left" for="BussinessName">Bussiness Name:</label>
                                                    <input class="form-control" type="text" id="ShowBussinessName" name="BussinessName"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="BussinessAddess">Bussiness Address:</label>
                                                    <input class="form-control" type="text" id="ShowBussinessAddess" name="BussinessAddess" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="OtherBussinessAddess">Others Bussiness Address</label>
                                                    <textarea name="OtherBussinessAddess" id="ShowOtherBussinessAddess" type="text" class="form-control" id="" cols="70" rows="3"></textarea>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div> 
                            </div>

                            <div class="row">
                                <div class="">
                                    <fieldset>
                                        <legend style="margin: 0!important"> Payment-Information</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label text-left" for="SoftwarePrice">Software Price :</label>
                                                    <input class="form-control" type="number" id="ShowSoftwarePrice" name="SoftwarePrice"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="InstallationSerge">Installation Serge:</label>
                                                    <input class="form-control" type="number" id="ShowInstallationSerge" name="InstallationSerge" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="SLAType">SLA Type:</label>
                                                    <select name="SLAType" id="ShowSLAType" class="form-select" id="">
                                                        <option value="" selected>Choose type....</option>
                                                        @foreach ($SLAs as $SLA)
                                                            <option value="{{ $SLA->id }}" selected>
                                                                {{ $SLA->Type }}</option>
                                                        @endforeach
                
                                                    </select>
                                                    {{-- <input class="form-control" type="text" name="SLAType" required> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="SLAAmount">SLA Amount:</label>
                                                    <input class="form-control" type="number" id="ShowSLAAmount" name="SLAAmount" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="BillingType"> Domain&Hosting Billing Type:</label>
                                                    {{-- <input class="form-control" type="text" name="BillingType" required> --}}
                                                    <select name="BillingType" id="ShowBillingType" class="form-select" id="">
                                                        <option value="" selected>Choose type....</option>
                                                        @foreach ($SLAs as $SLA)
                                                            <option value="{{ $SLA->id }}" selected>
                                                                {{ $SLA->Type }}</option>
                                                        @endforeach
                
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="BillingAmount"> Domain&Hosting Billing Amount:</label>
                                                    <input class="form-control" type="number" id="ShowBillingAmount" name="BillingAmount" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="BillingDate"> Domain&Hosting Billing Start Date:</label>
                                                    <input class="form-control" type="datetime-local" id="ShowBillingDate" name="BillingDate" selected>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                           
                            <fieldset>
                                <legend style="margin: 0!important"> Product-Information</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label text-left" for="ProductType">Product Type :</label>
                                            {{-- <input class="form-control" type="text" name="ProductType"  required> --}}
                                            <select name="ProductType" class="form-select" id="ShowProductType">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Products as $Product)
                                                    <option value="{{ $Product->id }}" selected>
                                                        {{ $Product->ProductType }}</option>
                                                @endforeach
        
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductInstallId">Product Install Id:</label>
                                            <input class="form-control" type="number" id="ShowProductInstallId" name="ProductInstallId" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductUrl">Product Url:</label>
                                            <input class="form-control" type="text" id="ShowProductUrl" name="ProductUrl" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductUserName">Product UserName:</label>
                                            <input class="form-control" type="text" id="ShowProductUserName" name="ProductUserName" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductPassword">Product Password:</label>
                                            <input class="form-control" type="text" id="ShowProductPassword" name="ProductPassword" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductInstallDate">Product Install Date:</label>
                                            <input class="form-control" type="datetime-local" id="ShowProductInstallDate" name="ProductInstallDate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductRenewDate"> Product Renew Date:</label>
                                            <input class="form-control" type="datetime-local" id="ShowProductRenewDate" name="ProductRenewDate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="RefrredBy">Refrred By:</label>
                                            {{-- <input class="form-control" type="text" name="RefrredBy" required> --}}
                                            <select name="RefrredBy"  class="form-select" id="ShowRefrredBy">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Refers as $Refer)
                                                    <option value="{{ $Refer->id }}" selected>
                                                        {{ $Refer->Name }}</option>
                                                @endforeach
        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="HostedBy">Hosted By:</label>
                                            {{-- <input class="form-control" type="text" name="HostedBy" required> --}}
                                            <select name="HostedBy" class="form-select" id="ShowHostedBy">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Hosts as $Host)
                                                    <option value="{{ $Host->id }}" selected>
                                                        {{ $Host->HostedBy }}</option>
                                                @endforeach
        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="DomainType">Domain Type:</label>
                                            {{-- <input class="form-control" type="text" name="DomainType" required> --}}
                                            <select name="DomainType" class="form-select" id="ShowDomainType">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Domains as $Domain)
                                                    <option value="{{ $Domain->id }}" selected>
                                                        {{ $Domain->Type }}</option>
                                                @endforeach
        
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="DomainProvide">Domain Provide:</label>
                                            {{-- <input class="form-control" type="text" name="DomainProvide" required> --}}
                                            <select name="DomainProvide" id="ShowDomainProvide" class="form-select" id="">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Domains as $Domain)
                                                    <option value="{{ $Domain->id }}" selected>
                                                        {{ $Domain->Provide }}</option>
                                                @endforeach
        
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </fieldset>
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script>
        $(document).ready(function () {  
            $('.ServiceShow').on('click', function(e) {
                e.preventDefault();
                // console.log('hello');
                var ID = $(this).attr('data-id');
                // console.log(ID);
                $.ajax({
                    type: "GET",
                    url: "/service/client/product/"+ID,
                    dataType: 'JSON',
                    success: function(data){
                        var myData = data.ServiceShow;
                        var myData1 = data.ShowClient;
                        // console.log(myData1);
                        $('#ClientServiceId').attr('value',myData.id);
                        $('#Client').text(myData1.Client);
                        $('#ShowPhone').text(myData1.ContactNumber);
                        $('#ShowPhone').text(myData1.ContactNumber);
                        $('#ShowAddress').text(myData1.Address);
                        $('#ShowBussinessName').val(myData.BussinessName);
                        $('#ShowBussinessAddess').val(myData.BussinessName);
                        $('#ShowOtherBussinessAddess').val(myData.BussinessName);
                        $('#ShowSoftwarePrice').val(myData.SoftwarePrice);
                        $('#ShowInstallationSerge').val(myData.InstallationSerge);
                        $('#ShowSLAType').val(myData.SLAType);
                        $('#ShowSLAAmount').val(myData.SLAAmount);
                        $('#ShowBillingType').val(myData.BillingType);
                        $('#ShowBillingAmount').val(myData.BillingAmount);
                        $('#ShowBillingDate').val(myData.BillingDate);
                        $('#ShowProductType').val(myData.ProductType);
                        $('#ShowProductInstallId').val(myData.ProductInstallId);
                        $('#ShowProductUrl').val(myData.ProductUrl);
                        $('#ShowProductUserName').val(myData.ProductUserName);
                        $('#ShowProductPassword').val(myData.ProductPassword);
                        $('#ShowProductInstallDate').val(myData.ProductInstallDate);
                        $('#ShowProductRenewDate').val(myData.ProductRenewDate);
                        $('#ShowRefrredBy').val(myData.RefrredBy);
                        $('#ShowHostedBy').val(myData.HostedBy);
                        $('#ShowDomainType').val(myData.DomainType);
                        $('#ShowDomainProvide').val(myData.DomainProvide);
                        
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