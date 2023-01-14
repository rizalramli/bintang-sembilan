<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($truckRental) ? $truckRental->date : date('Y-m-d'), ['class' => "form-control date-custom $is_invalid"]) !!}
    @error('date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse_id', 'Gudang') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($truckRental) ? $truckRental->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse_id']) !!}
    @error('warehouse_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('number_vehicles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('number_vehicles', 'Nopol') !!}
    {!! Form::text('number_vehicles', isset($truckRental) ? $truckRental->number_vehicles : null, ['id' => 'number_vehicles','class' => "form-control $is_invalid"]) !!}
    @error('number_vehicles')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('driver_name') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('driver_name', 'Nama Sopir') !!}
    {!! Form::text('driver_name', isset($truckRental) ? $truckRental->driver_name : '', ['class' => "form-control $is_invalid"]) !!}
    @error('driver_name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('loading_place') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('loading_place', 'Tempat Muat') !!}
    {!! Form::text('loading_place', isset($truckRental) ? $truckRental->loading_place : '', ['class' => "form-control $is_invalid"]) !!}
    @error('loading_place')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('purpose') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('purpose', 'Tujuan') !!}
    {!! Form::text('purpose', isset($truckRental) ? $truckRental->purpose : '', ['class' => "form-control $is_invalid"]) !!}
    @error('purpose')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('truck_cost') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('truck_cost', 'Ongkos Truk') !!}
    {!! Form::text('truck_cost', isset($truckRental) ? \App\Helpers\Human::CreateFormatRupiah($truckRental->truck_cost) : 0, ['id' => 'truck_cost','class' => "rupiah form-control $is_invalid"]) !!}
    @error('truck_cost')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<hr>
<h5>Pengeluaran</h5>
<hr>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('driver_cost') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('driver_cost', 'Gaji Sopir') !!}
    {!! Form::text('driver_cost', isset($truckRental) ? \App\Helpers\Human::CreateFormatRupiah($truckRental->driver_cost) : 0, ['id' => 'driver_cost','class' => "rupiah form-control $is_invalid"]) !!}
    @error('driver_cost')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('solar_cost') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('solar_cost', 'Biaya Solar') !!}
    {!! Form::text('solar_cost', isset($truckRental) ? \App\Helpers\Human::CreateFormatRupiah($truckRental->solar_cost) : 0, ['id' => 'solar_cost','class' => "rupiah form-control $is_invalid"]) !!}
    @error('solar_cost')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('damage_cost') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('damage_cost', 'Biaya Kerusakan') !!}
    {!! Form::text('damage_cost', isset($truckRental) ? \App\Helpers\Human::CreateFormatRupiah($truckRental->damage_cost) : 0, ['id' => 'damage_cost','class' => "rupiah form-control $is_invalid"]) !!}
    @error('damage_cost')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($truckRental) ? $truckRental->description : null, ['id' => 'description','class' => "form-control"]) !!}
</div>