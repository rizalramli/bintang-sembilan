{!! Form::open(['route' => ['banks.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('banks.show', $id) }}" class='btn btn-info btn-sm'>
        <i data-feather='eye'></i> Detail
    </a>
    <a href="{{ route('banks.edit', $id) }}" class='btn btn-warning btn-sm'>
        <i data-feather='edit'></i> Edit
    </a>
    {!! Form::button('<i data-feather="trash-2"></i> Hapus', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
 