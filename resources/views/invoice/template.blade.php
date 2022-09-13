@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
    <div class="page-body">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <h1 class="fs-3 text-info fw-bolder">WORLDSOFTZONE</h1>
                    <p class="m-0">Parents Home, Ground Floor</p>
                    <p class="m-0">Girls School Para, Boro Bazar</p>
                    <p class="m-0">Meherpur Sadar, Meherpur-7100 </p>
                    <p class="m-0">Hotline 01841329494</p>
                    <p class="m-0">support@worldsoftzone.com</p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="fs-4 text-info fw-bolder text-strat">INVOICE</h1>
                        </div>
                        <div class="col-md-6">
                            <button  class="btn btn-primary text-end InvociePrint">Print</button>
                            <a href="" class="btn btn-primary text-end mx-auto">Export Pdf</a>
                        </div>


                    </div>
                    <div class="mb-3 row  m-0">
                        <label class="col-sm-5 col-form-label " for="inputEmail3">Date:</label>
                        <div class="col-sm-6">
                            <input class="form-control p-1 border-secondary" id="inputEmail3" type="email" value="{{ date('F m, Y',strtotime($dataShowInvoice->InvoiceDate)) }}">
                        </div>

                    </div>
                    <div class="mb-3  row m-0">
                        <label class="col-md-5 col-form-label" for="inputEmail3">Invoice #:</label>
                        <div class="col-sm-6">
                            <input class="form-control p-1 border-secondary" id="inputEmail3" type="email" value="{{($dataShowInvoice->InvoiceName) }}">
                        </div>

                    </div>
                    <div class="mb-3 row m-0">
                        <label class="col-md-5 col-form-label" for="inputEmail3">Customer ID:</label>
                        <div class="col-sm-6">
                            <input class="form-control p-1 border-secondary" value="{{$dataShowClient->ClientId}}" id="inputEmail3" type="email">
                        </div>

                    </div>
                    <div class="mb-3 row m-0">
                        <label class="col-md-5 col-form-label" for="inputEmail3">Purchase Order Date:</label>
                        <div class="col-sm-6">
                            <input class="form-control p-1 border-secondary" id="inputEmail3" type="email" value="{{ date('F m, Y', strtotime($dataShowInvoice->PurchaseOrderDate))  }}">
                        </div>
                    </div>
                    <div class="mb-3 row m-0">
                        <label class="col-md-5" for="inputEmail3">Payment Due Date:</label>
                        <div class="col-sm-6">
                            <input class="form-control p-1 border-secondary" id="inputEmail3" type="email" value="{{  date('F m, Y', strtotime($dataShowInvoice->PaymentDueDate)) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h6 class="fs-6 text-info fw-bolder bg-info px-3">Bill To:</h6>
                    <p>{{$dataShowClient->Client}}</p>
                    <p>{{$dataShowClient->Address}}</p>
                    <p>{{$dataShowClient->ContactNumber}}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fs-6 text-info fw-bolder bg-info px-3">Project Summery:</h6>
                    <p>{{$dataShowInvoiceItem->ProductName}}</p>
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

                            <tr>
                            <td> {{$dataShowInvoiceItem->ProductName}} </td>
                            <td> {{$dataShowInvoiceItem->Description}} </td>
                            <td>{{$dataShowInvoiceItem->Qty}}</td>
                            <td>{{$dataShowInvoiceItem->UnitPrice}}</td>
                            <td>{{$dataShowInvoiceItem->LineTotal}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
           </div>

           <div class="row mt-2">
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
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>
                                    Sub-Total: <span style="margin-left: 200px"> {{ $dataShowInvoice->SubTotal }}</span> <br>
                                    <b class="py-1">Discount: <span style="margin-left: 200px">{{ $dataShowInvoice->Discount }}</span> </b> <br>
                                    <hr class="bg-info">
                                    <b>TOTAL: <span style="margin-left: 220px"> {{ $dataShowInvoice->Total }}</b> </span> <br>
                                    Amount <span style="margin-left: 215px">{{ $dataShowInvoice->Amount }}</span> <br>
                                    Due <span style="margin-left: 17.5em"> {{ $dataShowInvoice->	Due }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
           </div>

    </div>

    </div>
    <style>
        #success-color {
            background-color: #e3ebf2;
            padding: 8px !important;
            border-radius: 3px !important;
        }

        #title {
            /* color: white; */
            font-size: 18px;

        }
        @media print {
            dashboard.inc.main{
                display:none !important;
                visibility:hidden !important;
        }
    }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.InvociePrint').on('click',function(){
                window.print();
                return false;
            });
        });
    </script>
@endsection

@section('header')
    <script></script>
@endsection
@section('footer')
@endsection
