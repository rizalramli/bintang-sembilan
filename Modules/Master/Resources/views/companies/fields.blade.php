<!-- Name Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('name', 'Nama Perusahaan') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Owner Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('owner', 'Pemilik Perusahaan') !!}
    {!! Form::text('owner', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('phone', 'No HP') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('address', 'Alamat') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('district', 'Kecamatan') !!}
    {!! Form::text('district', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('city', 'Kota / Kabupaten') !!}
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Province Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('province', 'Provinsi') !!}
    {!! Form::text('province', null, ['class' => 'form-control','maxlength' => 125,'maxlength' => 125]) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6 mb-1">
{!! Form::label('image', 'Gambar:') !!}
    <input id="logo" type="file" class="form-control form-control-sm" name="logo">
    <br>
    <button type="button" class="btn btn-danger btn-sm" id="btn-delete-image">Hapus</button>
    <br>
    <br>
    @if(isset($company) && $company->logo != null)
    <img height="100" width="100" id="imgPreview" class="img-thumbnail" src="{{ storage_path($company->logo) }}" />
    @else
    <img height="100" width="100" id="imgPreview" class="img-thumbnail" src="{{ asset('images/noimage.png') }}" />
    @endif
</div>


@push('third_party_scripts')
<script>
     $(document).ready(() => {
        let default_image = "{{ asset('images/noimage.png') }}";

        $("#logo").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $('#btn-delete-image').click(function() {
            $('#imgPreview').attr('src', default_image);
            $('#logo').val(null);
        });
    });
</script>
@endpush
