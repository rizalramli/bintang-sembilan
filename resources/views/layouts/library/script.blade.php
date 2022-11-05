@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
<script>
    $(document).ready(function() {
        let service_schedule_date = $('.datetime-custom').flatpickr({
            enableTime: true,
            altFormat: "Y-m-d H:i:s",
            dateFormat: "Y-m-d H:i:s",
            time_24hr: true,
        });
    });
    $(document).ready(function() {
        let service_schedule_date = $('.date-custom').flatpickr({
            enableTime: false,
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d",
        });
    });
</script>
@endsection