
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
    <div class="container mt-5">
        <div class="row">

            {{-- View Table Service --}}
            <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table table-responsive table-hover table-striped table-bordered">
                        <thead>

                            <tr>
                                {{-- <th scope="col">SL</th> --}}
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Bill Date</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($Services as $Service)
                                <tr>
                                    <td>{{$SL++}}</td>
                                    <td>

                                        <button style="border:0px; background:none;" data-bs-toggle="modal"
                                            data-bs-target="#client_service_show_modal" data-whatever="@mdo" class="ServiceShow"
                                            data-bs-original-title="" data-id="{{ $Service->id }}">
                                            <a href="" class="text-decoration-underline border-0"> {{ $Service->ProductName }}</a>
                                        </button>
                                    </td>
                                    <td>
                                        {{date('d-m-Y', strtotime($Service->ProductBillDate))}}
                                    </td>
                                    <td>
                                        <span>OT_Cost: </span>{{ $Service->SoftwarePrice }} <br>
                                        <span>SLA_Type: </span>{{ $Service->Type }} <br>
                                        <span>SLA_Amount: </span>{{ $Service->SLAAmount }}
                                    </td>

                                    <td>
                                        <a href="/client/per-service/{{ $Service->id }}/delete" class="">
                                            <i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody> --}}
                    </table>
                </div>
            </div>



        </div>
         {{-- client service show --}}
         {{-- <div class="modal fade" id="client_service_show_modal" tabindex="-1" role="dialog"
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

                            <fieldset>
                                <legend style="margin: 0!important"> Product-Information</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="col-form-label text-left" for="ProductType">Product Type :</label>
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
                                            <label class="col-form-label text-left" for="ProductName">Product Name :</label>

                                            <select name="ProductName" class="form-select" id="ShowProductName" id="">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Products as $Product)
                                                    <option value="{{ $Product->id }}" selected>
                                                        {{ $Product->ProductName }}</option>
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
                                            <label class="col-form-label" for="ProductInstallDate">Product Install Date:</label>
                                            <input class="form-control" type="datetime-local" id="ShowProductInstallDate" name="ProductInstallDate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="ProductBillDate">Product Bill Date:</label>
                                            <input class="form-control" type="datetime-local" id="ShowProductBillDate" name="ProductBillDate" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="RefrredBy">Refrred By:</label>

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
                                            <label class="col-form-label" for="DomainProvide">Domain Provide:</label>
                                            <select name="DomainProvide" id="ShowDomainProvide" class="form-select" id="">
                                                <option value="" selected>Choose type....</option>
                                                @foreach ($Domains as $Domain)
                                                    <option value="{{ $Domain->id }}" selected>
                                                        {{ $Domain->Provide }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <label class="col-form-label" for="ProductNote">Product Note:</label>
                                            <textarea name="Note"  placeholder="hak" id="ShowProductNote" class="form-control textarea" id="" cols="30" rows="4"
                                            ></textarea>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

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
                                                    <label class="col-form-label" for="SLAType">SLA Type:</label>
                                                    <select name="SLAType" id="ShowSLAType" class="form-select" id="">
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
                                                    <label class="col-form-label" for="SLAAmount">SLA Amount:</label>
                                                    <input class="form-control" type="number" id="ShowSLAAmount" name="SLAAmount" required>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div> --}}

    </div>

    

    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                        var myDataClient = data.ShowClient;
                        // console.log(myDataClient);
                        $('#ClientServiceId').attr('value',myData.id);
                        // $('#Client').text(myDataClient.Client);
                        // $('#ShowPhone').text(myDataClient.ContactNumber);
                        // $('#ShowPhone').text(myDataClient.ContactNumber);
                        // $('#ShowAddress').text(myDataClient.Address);
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
                        $('#ShowProductName').val(myData.ProductName);
                        $('#ShowProductInstallId').val(myData.ProductInstallId);
                        $('#ShowProductInstallDate').val(myData.ProductInstallDate);
                        $('#ShowProductBillDate').val(myData.ProductBillDate);
                        $('#ShowRefrredBy').val(myData.RefrredBy);
                        $('#ShowHostedBy').val(myData.HostedBy);
                        $('#ShowDomainType').val(myData.DomainType);
                        $('#ShowDomainProvide').val(myData.DomainProvide);
                        $('#ShowProductNote').val(myData.Note);

                    }
                });

            });

        });
     </script> --}}
@endsection

@section('header')
   <script>

   </script>
@endsection
@section('footer')
