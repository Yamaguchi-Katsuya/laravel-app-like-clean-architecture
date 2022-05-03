@php
    use Illuminate\Support\Carbon;
@endphp

<div class="form-group">
    {{ Form::label($label, null) }}
    <input
        type="datetime-local"
        name="{{ $name }}"
        value="{{ Carbon::parse($defaultValue)->format('Y-m-d\TH:i') }}"
        @foreach ($attributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
    >
</div>
@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
