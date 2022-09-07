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
                                <th scope="col">SL</th>
                                <th scope="col">HostedBy</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

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
                                {{ Form::open(['url' => '/host', 'method' => 'POST', 'class' => 'theme-form', 'files' => true]) }}
                                <div class="container">
                                    <h1 class="fs-4 text-info">INVOICE</h1>
                                    <div class="row g-4">

                                        <div class="col-md-2">
                                            <input class="form-control" style="border-color:#CED4DA;" type="text" placeholder="Date">
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-control" style="border-color:#CED4DA;" type="text" placeholder="Invoice">
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-control" style="border-color:#CED4DA;" type="text" placeholder="Client ID">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" style="border-color:#CED4DA;" type="text" placeholder="Purchase Order Date">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" style="border-color:#CED4DA;" type="text" placeholder="Payment Due by">
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" id="ItemArea">
                                                    <div class="col-md-2">
                                                        <input type="text" name="ItemName[]" class="form-control"placeholder='Item Name' required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="ItemDescription[]" class="form-control" placeholder="Item Description">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number"name="ItemQty[]" class="form-control" placeholder="Qty" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="ItemUnitPrice[]" class="form-control"placeholder='UnitPrice' required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="ItemPrice[]" class="form-control"placeholder='LineTotal' required>
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
                                                <label class="col-sm-3 col-form-label">Sub-Total:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Discount:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">TOTAL:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Advance:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Net Payable:</label>
                                                <div class="col-sm-5">
                                                  <input style="border-color:#CED4DA;" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 col-form-label">Account Number:</label>
                                                <div class="col-sm-6">
                                                  <input style="border-color:#CED4DA;" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 col-form-label">Payment Method:</label>
                                                <div class="col-sm-6">
                                                  <select name="" id="" class="form-control"  style="border-color:#CED4DA;">
                                                    <option value="">Choose ....</option>
                                                    <option value="">Bekhas</option>
                                                    <option value="">Nogod</option>
                                                    <option value="">Islamic Bank</option>
                                                  </select>
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
                // console.log('hdj');
                $('#ItemArea').append('<div class="row mt-3"><div class="col-md-2"><input type="text" name="ItemName[]" class="form-control" placeholder="Item Name"></div><div class="col-md-3"><input type="text" name="ItemDescription[]" class="form-control" placeholder="Item Description"></div><div class="col-md-2"><input type="number" name="ItemQty[]" class="form-control" placeholder="Qty"></div><div class="col-md-2"><input type="number" name="ItemUnitPrice[]" class="form-control" placeholder="UnitPrice"></div><div class="col-md-2"><input type="number" name="ItemPrice[]" class="form-control" placeholder="LineTotal"></div><div class="col-md-1"><button type="button" class="btn btn-danger" id="RemoveItemBtn"><i class="fa fa-minus"></i></button></div></div>');
            });
            $('body').on('click','#RemoveItemBtn',function(e){
                e.preventDefault();

                $(this).closest('.row').remove();
            });
        });
    </script>
@endsection

@section('header')
    <script></script>
@endsection
@section('footer')
@endsection
