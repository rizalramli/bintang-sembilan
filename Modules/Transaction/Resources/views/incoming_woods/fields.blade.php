{!! Form::hidden('id', isset($incomingWood) ? $incomingWood->id : null) !!}

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('template_wood_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('template_wood_id', 'Template Kayu') !!}
    {!! Form::select('template_wood_id', $template_wood, isset($incomingWood) ? $incomingWood->template_wood_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'template_wood_id']) !!}
    @error('template_wood_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($incomingWood) ? $incomingWood->date : date('Y-m-d'), ['class' => "form-control date-custom $is_invalid"]) !!}
    @error('date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('supplier_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('supplier_id', 'Supplier') !!}
    <a href="javascript:void(0)" class="float-right" data-bs-toggle="modal" data-bs-target="#modalAddSupplier">(Klik untuk menambah supplier baru)</a>
    {!! Form::select('supplier_id', $supplier, isset($incomingWood) ? $incomingWood->supplier_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'supplier_id']) !!}
    @error('supplier_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('number_vehicles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('number_vehicles', 'Nopol') !!}
    {!! Form::text('number_vehicles', isset($incomingWood) ? $incomingWood->number_vehicles : null, ['id' => 'number_vehicles','class' => "form-control $is_invalid"]) !!}
    @error('number_vehicles')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse_id', 'Gudang') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($incomingWood) ? $incomingWood->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse_id']) !!}
    @error('warehouse_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('wood_type_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('wood_type_id', 'Jenis Kayu') !!}
    {!! Form::select('wood_type_id', $wood_type, isset($incomingWood) ? $incomingWood->wood_type_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'wood_type_id']) !!}
    @error('wood_type_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('serial_number') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('serial_number', 'No. Seri SAKR') !!}
    {!! Form::text('serial_number', isset($incomingWood) ? $incomingWood->serial_number : '/SAKR/'.date('m').'/'.date('Y'), ['class' => "form-control $is_invalid"]) !!}
    @error('serial_number')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('proof_ownership') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('proof_ownership', 'Bukti Kepemilikan') !!}
    {!! Form::text('proof_ownership', isset($incomingWood) ? $incomingWood->proof_ownership : 'SPPT', ['class' => "form-control $is_invalid"]) !!}
    @error('proof_ownership')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_qty') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_qty', 'Total Batang') !!}
    {!! Form::text('total_qty', isset($incomingWood) ? $incomingWood->total_qty : 0, ['id' => 'total_qty','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_qty')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_volume', 'Total Volume') !!}
    {!! Form::text('total_volume', isset($incomingWood) ? $incomingWood->total_volume : 0, ['id' => 'total_volume','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($incomingWood) ? $incomingWood->description : null, ['id' => 'description','class' => "form-control"]) !!}
</div>
<!-- modal add supplier -->
<div class="modal fade text-start" id="modalAddSupplier" tabindex="-1" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Tambah Supplier</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAddSupplier">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-6 mb-1">
                        @php $is_invalid = ''; $errors->has('name') ? $is_invalid = 'is-invalid' : ''; @endphp
                        {!! Form::label('name', 'Nama') !!}
                        {!! Form::text('name', null, ['id' => 'name','class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 mb-1">
                        {!! Form::label('number_vehicles_supplier', 'Nopol') !!}
                        {!! Form::text('number_vehicles_supplier', null, ['id' => 'number_vehicles_supplier','class' => "form-control $is_invalid"]) !!}
                    </div>

                    <div class="form-group col-sm-6 mb-1">
                        @php $is_invalid = ''; $errors->has('address') ? $is_invalid = 'is-invalid' : ''; @endphp
                        {!! Form::label('address', 'Desa dan Kecamatan') !!}
                        {!! Form::text('address', null, ['id' => 'address','class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 mb-1">
                        @php $is_invalid = ''; $errors->has('city') ? $is_invalid = 'is-invalid' : ''; @endphp
                        {!! Form::label('city', 'Kota') !!}
                        {!! Form::text('city', null, ['id' => 'city','class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
                        @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 mb-1">
                        @php $is_invalid = ''; $errors->has('phone') ? $is_invalid = 'is-invalid' : ''; @endphp
                        {!! Form::label('phone', 'No Hp') !!}
                        {!! Form::text('phone', null, ['id' => 'phone','class' => "form-control $is_invalid",'maxlength' => 15,'maxlength' => 15]) !!}
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal"> Batalkan</button>
                <button id="addSupplier" type="button" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>