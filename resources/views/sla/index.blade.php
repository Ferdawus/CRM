
@extends('dashboard.inc.main')
{{-- @extends('dashboard.inc.footer') --}}

@section('content')
  <div class="page-body">
      <!-- Container-fluid starts-->
      <div class="col-md-11 m-auto">
        <div class="card">
          <div class="card-header" id="success-color">
            <h5 id="title">
                <button type="button" data-bs-toggle="modal" data-bs-target="#sla-insert" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create SLA">
                    <i class="fa-solid fa-circle-plus mr-2"></i>
                    Add
                </button>
                  SLA List
            </h5>
          </div>
          <div class="table-responsive">
            <table class="table table-responsive table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">SLA Type</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach ($Services as $Service)
                  <tr>
                    <td>{{$SL++}}</td>
                    <td>{{$Service->Type}}</td>
                    <td>{{$Service->Description}}</td>
                    <td class="d-flex">

                      <button  class="border-0 EditBtn" data-bs-toggle="modal" data-bs-target="#sla-edit" data-whatever="@mdo" class="btn btn-primary-light"  data-bs-original-title="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update SLA" data-id="{{ $Service->id }}">
                        <i class="icofont icofont-edit fs-5 text-secondary"></i>
                      </button>
                      <a href="/sla/service/{{$Service->id}}/delete" class=""><i class="icofont icofont-close-squared-alt ms-2 fs-5 text-danger"></i></a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

          {{-- insert modal --}}
          <div class="modal fade" id="sla-insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Add New SLA </h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ Form::open(['url' => '/sla/service','method'=>'POST','class'=>'theme-form','files'=> true]) }}
                      <div class="mb-3">
                        <label class="col-form-label" for="Type">SLA Type:</label>
                        <input class="form-control" type="text" name="Type"  required>
                      </div>

                      <div class="mb-3">
                        <label class="col-form-label" for="Description">Description:</label>
                        <textarea name="Description" class="form-control" id="" cols="10" rows="5"></textarea>

                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add New Product </button>
                </div>

                {{ Form::close() }}
              </div>
            </div>
          </div>

          {{-- Edit modal --}}
          <div class="modal fade" id="sla-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Update SLA </h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ Form::open(['url' => '/sla/service/update','method'=>'POST', 'id'=>'SlaEditFrom','class'=>'theme-form','files'=> true]) }}
                        <input type="hidden" name="id" id="IdEdit">
                      <div class="mb-3">
                        <label class="col-form-label" for="Type">SLA Type:</label>
                        <input class="form-control" type="text" id="EditType" name="Type"  required>
                      </div>

                      <div class="mb-3">
                        <label class="col-form-label" for="Description">Description:</label>
                        <textarea name="Description" class="form-control" id="EditDescription" cols="10" rows="5"></textarea>

                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Update SLA </button>
                </div>

                {{ Form::close() }}
              </div>
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
  $(document).ready(function(){
      $('.EditBtn').on('click',function(e){
          e.preventDefault();
          var ID = $(this).attr('data-id');
          $.ajax({
              type: "get",
              url: "/sla/service/edit/" + ID,
              data: $('#SlaEditFrom').serialize(),
              dataType: "JSON",
              success: function(data) {
              $('#IdEdit').attr('value',data.id);
                $('#EditType').val(data.Type);
                $('#EditDescription').val(data.Description);
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

@endsection










