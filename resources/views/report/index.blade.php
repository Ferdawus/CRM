
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
        <div class="col-md-12">
            <figure class="heading text-center">
                <h1>Total Report</h1>
            </figure>
            <figure class="col-md-5 mx-auto">
                <figure>
                    <label for="DateFrom" class="control-level">DateFrom</label>
                    <input type="date" name="DateFrom" class="form-control">
                </figure>
                <figure>
                    <label for="DateTo" class="control-level">DateTo</label>
                    <input type="date" name="DateTo" class="form-control">
                </figure>
                <input type="submit" name="submit" value="Search Report" class="btn btn-primary">
            </figure>
        </div>
      <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-hover table-striped">
                      <thead>
                        <tr>
                          <th scope="col">SL</th>
                          <th scope="col">Client</th>
                          <th scope="col">Contact No</th>
                          <th scope="col">Billing</th>
                          <th scope="col">Payment</th>
                          <th scope="col">Due</th>
                          <th scope="col">Payment Status</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($Clients as $Client)
                            @php
                                $TotalBill = DB::table('invoices')->where('ClientName', $Client->id)->sum('Total');
                            @endphp
                          <tr>
                            <td>{{$Sl++}}</td>
                            <td>{{$Client->Client}}</td>
                            <td>{{$Client->ContactNumber}}</td>
                            <td> {{ number_format($TotalBill, 2) }} </td>
                            <td> {{ number_format($Client->TotalPayment, 2) }} </td>
                            <td> {{ number_format($TotalBill - $Client->TotalPayment, 2) }} </td>
                            <td> {{$Client->PaymentStatus}} </td>
                            <td></td>
                            <td class="d-flex">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smsModal">Send Sms</button>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2"> Massage Send </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => '/sms', 'method' => 'POST', 'class' => 'theme-form', 'files' => true]) }}
                    <div class="mb-3">
                        <label class="col-form-label" for="Number">Number</label>
                        <input class="form-control" type="text" name="Number" required>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label" for="Message">Message:</label>
                        <textarea name="Message" class="form-control" id="" cols="10" rows="5"></textarea>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
                {{ Form::close() }}
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
      $(document).ready(function() {

      });
  </script>
@endsection

@section('header')
   <script>

   </script>
@endsection
@section('footer')

@endsection
