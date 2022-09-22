@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
    <div class="page-body" id="body">
        <div class="container" id="data">

            <div class="row">
                <div class="col-md-6">
                        <h1 class="fs-3 text-info fw-bolder">WORLDSOFTZONE</h1>
                        <p class="m-0">Parents Home, Ground Floor</p>
                        <p class="m-0">Girls School Para, Boro Bazar</p>
                        <p class="m-0">Meherpur Sadar, Meherpur-7100 </p>
                        <p class="m-0">Hotline 01841329494</p>
                        <p class="m-0">support@worldsoftzone.com</p>
                </div>
                {{-- <div class="col-md-6">
                    <h1 class="fs-4 text-info fw-bolder text-strat">INVOICE</h1>
                    <button  onclick="printPage()"  class="btn btn-primary text-end Print" >Print</button>





                    <div class="mb-3 row m-0">
                        <label class="col-md-5" for="inputEmail3">Payment Due Date:</label>
                        <div class="col-sm-6">
                            <input class="form-control p-1 border-secondary" id="inputEmail3" type="email" value="{{  date('F m, Y', strtotime($Invoice->PaymentDueDate)) }}">
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <h1 class="fs-4 text-info fw-bolder text-strat">INVOICE</h1>
                    <button  onclick="printPage()"  class="btn btn-primary text-end Print" >Print</button>
                    <table>
                        <tr>
                            <td><b>Date:</b></td>
                            <td>{{ date('F m, Y',strtotime($Invoice->InvoiceDate)) }}</td>
                        </tr>
                        <tr>
                            <td> <b>Invoice #:</b></td>
                            <td>{{($Invoice->InvoiceName) }}</td>
                        </tr>
                        <tr>
                            <td><b>Customer ID:</b></td>
                            <td>{{$Invoice->ClientId}}</td>
                        </tr>
                        <tr>
                            <td><b>Purchase Order Date:</b></td>
                            <td>{{ date('F m, Y', strtotime($Invoice->PurchaseOrderDate)) }}</td>
                        </tr>
                        <tr>
                            <td><b>Payment Due Date:</b></td>
                             <td>{{  date('F m, Y', strtotime($Invoice->PaymentDueDate)) }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h6 class="fs-6 text-info text-info-print fw-bolder fw-bolder-print bg-info bg-info-print  px-3">Bill To:</h6>
                    <p>{{$Invoice->Client}}</p>
                    <p>{{$Invoice->Address}}</p>
                    <p>{{$Invoice->ContactNumber}}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fs-6 text-info fw-bolder bg-info px-3">Project Summery:</h6>
                    @foreach ($InvoiceItem as $Item)


                        <p>
                            {{ ($Item->IsSetup) == 1 ? $Item->ProductName."(setup)" : $Item->ProductName }}
                        </p>

                    @endforeach
                </div>
            </div>

           <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                            <th scope="col">Item</th>
                            <th  scope="col">Description</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Line Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($InvoiceItem as $Item)
                                <tr>
                                    <td> {{($Item->IsSetup) == 1 ? $Item->ProductName."(setup)" : $Item->ProductName }} </td>
                                    <td> {{$Item->Description}} </td>
                                    <td>{{$Item->Qty}}</td>
                                    <td>{{$Item->UnitPrice}}</td>
                                    <td>{{$Item->LineTotal}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
           </div>

           <div class="row mt-4">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Payment Terms & Condition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    01. All payment should be clear before final delivery of the project <br>
                                    02. Montly Service Charge with Cloud Hosting Tk. 2000 <br>
                                    03. Montly Charge should be clear within 1st week in every month
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td>
                                    <b>Sub-Total:</b>
                                    <td>{{ $Invoice->SubTotal }}</td>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Discount:</b></td>
                                <td>{{ $Invoice->Discount }}</td>
                            </tr>
                            <tr>
                                <td><b>Total:</b></td>
                                <td> {{ $Invoice->Total }}</td>
                            </tr>
                            <tr>
                                <td><b>Amount:</b></td>
                                <td>{{ $Invoice->Amount }}</td>
                            </tr>
                            <tr>
                                <td><b>Due</b></td>
                                <td>{{ $Invoice->Due }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
           </div>

        </div>


    </div>
    <style>
        <link>
        #success-color {
            background-color: #e3ebf2;
            padding: 8px !important;
            border-radius: 3px !important;
        }

        #title {
            /* color: white; */
            font-size: 18px;

        }


    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        function printPage()
        {
            window.print();
        }
        
    </script>
@endsection

@section('header')
    <script></script>
@endsection
@section('footer')
@endsection
