@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
    <div class="page-body" id="body">
 <div class="container">
    <div class="row pt-5">
        <div class="col-md-1">
            <img src="/img/logo.jpg" height="60px" width="60px"  alt="logo">
        </div>

        <div class="col-md-4 mx-auto">
            <h2 class="text-uppercase border border-info text-center bg-info rounded  font-monospace"> Money Receipt</h2>
        </div>

        <div class="col-md-4  text-end">
            <h1 class="fs-3 text-info fw-bolder">WORLDSOFTZONE</h1>
            <p class="m-0  font-monospace">Parents Home, Ground Floor</p>
            <p class="m-0 font-monospace">Girls School Para, Boro Bazar</p>
            <p class="m-0 font-monospace">Meherpur Sadar, Meherpur-7100 </p>
            <p class="m-0 font-monospace">Hotline 01841329494</p>
            <p class="m-0 font-monospace">support@worldsoftzone.com</p>
        </div>
    </div>
    <hr>

    <div class="row py-4">
        <div class="col-md-4">
            <div class="mb-3 row">
                <label class="col-md-4 control" >Rciept No :</label>
                <div class="col-md-8">
                <input id="" name="name" value="{{ $Transaction->TransactionId }}" type="text" placeholder="" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 row">
                <label class="col-md-3 control" >TAKA :</label>
                <div class="col-md-9">
                <input id="" name="name" value="{{  $Transaction->Amount }}" type="text" placeholder="" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 row">
                <label class="col-md-3 control" >Date :</label>
                <div class="col-md-9">
                <input id="" name="name" value="{{ $Transaction->TransactionDate }}" type="text" placeholder="" class="form-control border-info">
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-4">
            <div class="mb-3 row">
                <label class="col-md-5 control" >Client Name:</label>
                <div class="col-md-7">
                <input id="" name="name" type="text" value="{{ $Transaction->Client }}" placeholder="" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 row">
                <label class="col-md-4 control" >Number :</label>
                <div class="col-md-8">
                <input id="" name="name" type="text" value="{{ $Transaction->ContactNumber }}" placeholder="" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 row">
                <label class="col-md-4 control" >Account No :</label>
                <div class="col-md-8">
                    <input id="" name="name" type="text" placeholder="" value="{{ $Transaction->AccountNumber }}" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="my-5 col-md-12 py-4 border border-info rounded">
        <h5 class="text-center font-monospace" style="letter-spacing: 11px">WorldSoftZone.com</h5>
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
@endsection

@section('header')
    <script></script>
@endsection
@section('footer')
@endsection
