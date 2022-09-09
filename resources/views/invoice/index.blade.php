@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="col-md-11 m-auto">
            <div class="card">
                <div class="card-header" id="success-color">
                    <h5 id="title">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#invoice-insert" data-whatever="@mdo"
                            class="btn btn-primary-light" data-bs-original-title="" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Create User">
                            <i class="fa-solid fa-circle-plus mr-2"></i>
                            Add
                        </button>
                        Invoice List
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                            <tr>
                                {{-- <th scope="col">SL</th> --}}
                                <th scope="col">Client</th>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Purchase Order Date</th>
                                <th scope="col">Payment Due Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">SubTotal</th>
                                <th scope="col">Discount </th>
                                <th scope="col">Total </th>
                                {{-- <th scope="col">Action</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Invoices as $Invoice)
                                <tr>
                                    {{-- <td></td> --}}
                                    <td>{{$Invoice->ClientName}}</td>
                                    <td>{{date('d-m-Y', strtotime($Invoice->InvoiceDate))}}</td>
                                    <td>{{$Invoice->InvoiceName}}</td>

                                    <td>{{date('d-m-Y', strtotime($Invoice->PurchaseOrderDate))}}</td>
                                    <td>{{date('d-m-Y', strtotime($Invoice->PaymentDueDate))}}</td>
                                    <td>{{$Invoice->PaymentMethod}}</td>
                                    <td>{{$Invoice->SubTotal}}</td>
                                    <td>{{$Invoice->Discount}}</td>
                                    <td>{{$Invoice->Total}}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- insert modal --}}
                <div class="modal fade" id="invoice-insert" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">Add New Invoice </h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ Form::open(['url' => '/invoice', 'method' => 'POST', 'class' => 'theme-form', 'files' => true]) }}
                                <div class="container">
                                    <h1 class="fs-4 text-info">INVOICE</h1>
                                    <div class="row g-4">
                                        <div class="col-md-2  mb-3">

                                            <label class="col-form-label pt-0 text-left" for="ClientName"> Client:</label>
                                            <select name="ClientName" class="form-select" id="Client">
                                                <option value="" selected>Select Client....</option>
                                                @foreach ($Clients as $Client)
                                                    <option value="{{ $Client->id }}">
                                                        {{ $Client->Client }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="InvoiceDate" class="col-form-label pt-0">Invoice Date:</label>
                                            <input class="form-control" name="InvoiceDate" style="border-color:#CED4DA;" type="date" placeholder="Invoice Date">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="InvoiceName" class="col-form-label pt-0">Invoice #:</label>
                                            <input class="form-control" name="InvoiceName" style="border-color:#CED4DA;" type="text" placeholder="Invoice">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="PurchaseOrderDate" class="col-form-label pt-0">Purchase Order Date :</label>
                                            <input class="form-control"  name="PurchaseOrderDate" style="border-color:#CED4DA;" type="date" placeholder="Purchase Order Date">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="PaymentDueDate" class="col-form-label pt-0">Payment Due by:</label>
                                            <input class="form-control"  name="PaymentDueDate" style="border-color:#CED4DA;" type="date" placeholder="Payment Due by">
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" id="ItemArea">
                                                    <div class="col-md-2">
                                                        <select  class="form-select ItemShowProduct" id="Item" name="ItemName[]">
                                                            <option value="" selected>Select Item....</option>
                                                            @foreach ($Items as $Item)
                                                                <option value="{{ $Item->id }}">
                                                                    {{ $Item->ProductName }}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="ItemDescription[]" class="form-control" placeholder="Item Description">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number"name="ItemQty[]" class="form-control" placeholder="Qty" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="ItemUnitPrice[]" class="form-control"placeholder='Unit Price' required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="ItemLineTotal[]" class="form-control"placeholder='Line Total' required>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-primary" id="AddItemBtn"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 col-form-label">Account Number:</label>
                                                <div class="col-sm-6">
                                                  <input style="border-color:#CED4DA;" name="AccountNumber" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 col-form-label">Payment Method:</label>
                                                <div class="col-sm-6">
                                                  <select name="PaymentMethod" id="" class="form-control"  style="border-color:#CED4DA;">
                                                    <option value="">Choose ....</option>
                                                    <option value="Chash">Chash</option>
                                                    <option value="Bkhas">Bkhas</option>
                                                    <option value="Nogod">Nogod</option>
                                                    <option value="Bank">Bank</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Sub-Total:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" id="SubTotal" name="SubTotal" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Discount:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" id="Discount" name="Discount" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">TOTAL:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" id="Total" name="Total" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Advance:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" name="Advance" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Net Payable:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" name="NetPayable" class="form-control" type="number">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr style="background-color:#CED4DA;">

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Add New Invoice </button>
                            </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #success-color {
            background-color: #e4ebf2;
            padding: 8px !important;
            border-radius: 4px !important;
        }

        #title {
            /* color: white; */
            font-size: 18px;

        }
    </style>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#AddItemBtn').on('click',function(e){
                e.preventDefault();
                // console.log('hdj')
                // var option ="<option>shjsah</option>";
                var options = $('.ItemShowProduct').html();
                // console.log(options);

                $('#ItemArea').append(`<div class="row mt-3"><div class="col-md-2"> <select  class="form-select" id="Item" name="ItemName[]">${options}</select></div><div class="col-md-3"><input type="text" name="ItemDescription[]" class="form-control" placeholder="Item Description"></div><div class="col-md-2"><input type="number" name="ItemQty[]" class="form-control" placeholder="Qty"></div><div class="col-md-2"><input type="number" name="ItemUnitPrice[]" class="form-control" placeholder="UnitPrice"></div><div class="col-md-2"><input type="number" name="ItemLineTotal[]" class="form-control" placeholder="LineTotal"></div><div class="col-md-1"><button type="button" class="btn btn-danger" id="RemoveItemBtn"><i class="fa fa-minus"></i></button></div></div>`);
            });
            $('body').on('click','#RemoveItemBtn',function(e){
                e.preventDefault();

                $(this).closest('.row').remove();
            });
            $('#SubTotal').on('keyup',function(){
                calculate();
            });
            $('#Discount').on('keyup',function(){
                calculate();
            });
            function calculate()
            {
                var SubTotal = parseInt($('#SubTotal').val());
                var Discount = parseInt($('#Discount').val());
                // console.log(Discount + 1);
                var Total = SubTotal + Discount
                $('#Total').val(Total);
            }
        });
    </script>
@endsection

@section('header')
    <script></script>
@endsection
@section('footer')
@endsection
