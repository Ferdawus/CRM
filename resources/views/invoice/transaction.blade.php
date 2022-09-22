{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Money Receipt</title>
</head>
<body> --}}
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
    <div class="page-body">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-info text-decoration-underline">Client Information</h4>
                <table>
                    <tr>
                        <td><b>Name:</b></td>
                        <td>{{ $Client_Invoice->Client }}</td>
                    </tr>
                    <tr>
                        <td><b>Contact No:</b></td>
                        <td>{{ $Client_Invoice->ContactNumber }}</td>
                    </tr>
                    <tr>
                        <td><b>Country:</b></td>
                        <td>{{ $Client_Invoice->Country}}</td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td>{{  $Client_Invoice->Address }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4 class="text-info text-decoration-underline">Invoice</h4>
                <table>
                    <tr>
                        <td><b>Date:</b></td>
                        <td>{{ date('F m, Y', strtotime($Client_Invoice->InvoiceDate)) }}</td>
                    </tr>

                    <tr>
                        <td><b>Invoice #:</b></td>
                        <td> {{ $Client_Invoice->InvoiceName }} </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Transaction No</th>
                            <th>Transaction Date</th>
                            <th>Pyment Method</th>
                            <th>Account Number</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($getTransaction_per_invoices as $value)
                        <tr>
                            <td>{{ $value->TransactionId }}</td>
                            <td>{{ $value->TransactionDate }}</td>
                            <td>{{ $value->PymentMethod }}</td>
                            <td>{{ $value->AccountNumber }}</td>
                            <td>{{ $value->Amount }}</td>
                            <td>
                                <a href="/invoice/receipt/{{$value->id}}" style="border:0px; background:none" id="ShowBtn">
                                <i class="fa-solid fa-receipt mx-2 fs-5"></i>
                                </a>
                                <a href="/invoice/invoice_per_transaction/delete/{{$value->id}}" style="border:0px; background:none" id="ShowBtn">
                                    <i class="icofont icofont-close-squared-alt  fs-5 text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <style>
          #success-color {
            background-color: #e4ebf2;
            padding: 8px !important;
            border-radius: 4px !important;
        }
        .border-info{
            border-color: #2196f3 !important;
        }

        #title {
            /* color: white; */
            font-size: 18px;

        }
        input[type="text"]{
		border-top: none !important;
		border-right: none !important;
		border-left: none !important;
		border-bottom: 1px dotted #2196f3 !important;
		box-shadow: none !important;
		-webkit-box-shadow: none !important;
		-moz-box-shadow: none !important;
		-moz-transition: none !important;
		-webkit-transition: none !important;
	}

	.heading{
        color: #2196f3 !important;
    }
    .control{
    padding-top:6px;
    }

    </style>

{{-- </body>
</html> --}}
@endsection

@section('header')

@endsection
@section('footer')
@endsection

