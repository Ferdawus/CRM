{{-- <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">Copyright 2022 © WSZ All rights reserved.</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
        </div>
      </div>
    </div>
  </footer> --}}
</div>
</div>





<!-- latest jquery-->
<script src="{{ asset('assets') }}/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="{{ asset('assets') }}/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ asset('assets') }}/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets') }}/js/sidebar-menu.js"></script>
<script src="{{ asset('assets') }}/js/config.js"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets') }}/js/bootstrap/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets') }}/js/chart/chartist/chartist.js"></script>
<script src="{{ asset('assets') }}/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{ asset('assets') }}/js/chart/knob/knob.min.js"></script>
<script src="{{ asset('assets') }}/js/chart/knob/knob-chart.js"></script>
<script src="{{ asset('assets') }}/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{ asset('assets') }}/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{ asset('assets') }}/js/prism/prism.min.js"></script>
<script src="{{ asset('assets') }}/js/clipboard/clipboard.min.js"></script>
<script src="{{ asset('assets') }}/js/counter/jquery.waypoints.min.js"></script>
<script src="{{ asset('assets') }}/js/counter/jquery.counterup.min.js"></script>
<script src="{{ asset('assets') }}/js/counter/counter-custom.js"></script>
<script src="{{ asset('assets') }}/js/custom-card/custom-card.js"></script>
<script src="{{ asset('assets') }}/js/notify/bootstrap-notify.min.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
<script src="{{ asset('assets') }}/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
<script src="{{ asset('assets') }}/js/dashboard/default.js"></script>
{{-- <script src="{{asset('assets')}}/js/notify/index.js"></script> --}}
<script src="{{ asset('assets') }}/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{ asset('assets') }}/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{ asset('assets') }}/js/datepicker/date-picker/datepicker.custom.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets') }}/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- <script src="{{asset('assets')}}/js/theme-customizer/customizer.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif
   
    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

@yield('footer')
