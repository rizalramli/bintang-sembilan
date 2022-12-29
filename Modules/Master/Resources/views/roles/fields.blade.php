<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('name') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('name', 'Nama') !!}
    {!! Form::text('name', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="row py-2">
    <div class="form-group col-sm-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="administrator_access" value="checked" />
            <label class="form-check-label" for="administrator_access">Pilih Semua</label>
        </div>
    </div>
</div>

<div class="form-group col-sm-12">
    @php $is_invalid = ''; $errors->has('permission_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    <div class="table-responsive {{$is_invalid}}">
        <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th width="20%">Modul</th>
                    <th width="80%">Hak Akses</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($permissions))
                @foreach ($permissions as $key => $value)
                <tr>
                    <td>{{ ucwords($value['group_name_desc']) }}</td>
                    <td>
                        <div class="form-control border-0">
                            @foreach ($value['data'] as $key_data => $value_data)
                            <div class="form-check form-check-inline mb-1">
                                @php
                                $is_checked = false;
                                if (isset($permissions_checked)) {
                                foreach ($permissions_checked as $key_checked => $value_checked) {
                                if ($value_data['id'] == $value_checked->id) {
                                $is_checked = true;
                                }
                                }
                                }
                                @endphp
                                {!! Form::checkbox('permission_id[]', $value_data['id'], $is_checked, ['class' => 'form-check-input checkbox_permission', 'id' => 'permission_id_'.$value_data['id']]) !!}
                                <label class="form-check-label" for="permission_id_{{ $value_data['id'] }}">{{ ucwords($value_data['last_name']) }}</label>
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>Belum Ada Data</td>
                    <td>
                        -
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@push('third_party_scripts')
<script>
    $(document).on('click', '#administrator_access', function() {
        $('.checkbox_permission').not(this).prop('checked', this.checked);
    });
</script>
@endpush