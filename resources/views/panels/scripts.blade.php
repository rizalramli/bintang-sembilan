<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
<script src="{{asset('js/scripts/ui/ui-feather.js')}}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<script type="text/javascript">
        function showLoading(show) {
            // body...
            if(show==true)
            {
                $.LoadingOverlay("show");
                setTimeout(function(){
                        $.LoadingOverlay("hide");
                 }, 20000);

            }else{
                $.LoadingOverlay("hide");
            }
        }

</script>   

<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
@stack('third_party_scripts')
<!-- END: Page JS-->
