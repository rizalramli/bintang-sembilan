<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    {!! Form::text('date', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->date : date('Y-m-d'), ['class' => "form-control date-custom"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('number_vehicles', 'Nopol') !!}
    {!! Form::text('number_vehicles', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->number_vehicles : null, ['id' => 'number_vehicles','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('warehouse_id', 'Gudang Asal') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->warehouse_id : null, ['class' => "select2 form-control",'id' => 'warehouse_id']) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('destination', 'Tujuan') !!}
    {!! Form::text('destination', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->destination : null, ['id' => 'destination','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_qty_sj', 'Total Batang SJ') !!}
    {!! Form::text('total_qty_sj', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->total_qty_sj : 0, ['id' => 'total_qty_sj','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_volume_sj', 'Total Volume SJ') !!}
    {!! Form::text('total_volume_sj', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->total_volume_sj : 0, ['id' => 'total_volume_sj','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_qty_tally', 'Total Batang Tally') !!}
    {!! Form::text('total_qty_tally', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->total_qty_tally : 0, ['id' => 'total_qty_tally','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_volume_tally', 'Total Volume Tally') !!}
    {!! Form::text('total_volume_tally', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->total_volume_tally : 0, ['id' => 'total_volume_tally','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_qty_afkir', 'Total Batang Afkir') !!}
    {!! Form::text('total_qty_afkir', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->total_qty_afkir : 0, ['id' => 'total_qty_afkir','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_volume_afkir', 'Total Volume Afkir') !!}
    {!! Form::text('total_volume_afkir', isset($outsideWarehousePurchase) ? $outsideWarehousePurchase->total_volume_afkir : 0, ['id' => 'total_volume_afkir','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('payment_factory', 'Uang Pabrik') !!}
    {!! Form::text('payment_factory', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->payment_factory) : 0, ['id' => 'payment_factory','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('fare_down', 'Ongkos Turun') !!}
    {!! Form::text('fare_down', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->fare_down) : 0, ['id' => 'fare_down','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('grand_total', 'Grand Total') !!}
    {!! Form::text('grand_total', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->grand_total) : 0, ['id' => 'grand_total','class' => "rupiah form-control",'readonly']) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('fee', 'Fee') !!}
    {!! Form::text('fee', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->fee) : 0, ['id' => 'fee','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('paid', 'Yang Dibayar') !!}
    {!! Form::text('paid', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->paid) : 0, ['id' => 'paid','class' => "rupiah form-control",'readonly']) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('down_payment', 'DP') !!}
    {!! Form::text('down_payment', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->down_payment) : 0, ['id' => 'down_payment','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('nett', 'Bersih') !!}
    {!! Form::text('nett', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->nett) : 0, ['id' => 'nett','class' => "rupiah form-control",'readonly']) !!}
</div>

@push('third_party_scripts')
<script>
    $(document).ready(function() {
        $('#payment_factory').on('keyup', function () {
            var payment_factory = $(this).val();
            payment_factory = payment_factory.replace(/\./g, '');
            var fare_down = $('#fare_down').val();
            fare_down = fare_down.replace(/\./g, '');
            var total = parseInt(payment_factory) + parseInt(fare_down);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#grand_total').val(total);
        });

        $('#fare_down').on('keyup', function () {
            var fare_down = $(this).val();
            fare_down = fare_down.replace(/\./g, '');
            var payment_factory = $('#payment_factory').val();
            payment_factory = payment_factory.replace(/\./g, '');
            var total = parseInt(payment_factory) + parseInt(fare_down);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#grand_total').val(total);
        });

        $('#fee').on('keyup', function () {
            var fee = $(this).val();
            fee = fee.replace(/\./g, '');
            var grand_total = $('#grand_total').val();
            grand_total = grand_total.replace(/\./g, '');
            var total = parseInt(grand_total) - parseInt(fee);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#paid').val(total);
        });

        $('#down_payment').on('keyup', function () {
            var down_payment = $(this).val();
            down_payment = down_payment.replace(/\./g, '');
            var paid = $('#paid').val();
            paid = paid.replace(/\./g, '');
            var total = parseInt(paid) - parseInt(down_payment);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#nett').val(total);
        });
    });
</script>
@endpush