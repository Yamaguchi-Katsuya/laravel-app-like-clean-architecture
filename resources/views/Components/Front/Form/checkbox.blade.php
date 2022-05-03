@php
    use Illuminate\Database\Eloquent\Collection;
@endphp
<div class="form-group">
    {{ Form::label($label, null) }}
    @foreach ($list as $key => $value)
        @php
        $checked = $defaultValue instanceof Collection
            ? $defaultValue->contains($key)
            : collect($defaultValue)->containsStrict($value);
        @endphp
        <div class="form-check form-check-inline">
            {{ Form::checkbox(
                "{$name}[]",
                $key,
                $checked,
                array_merge(['id' => "{$name}_{$key}", 'class' => 'form-check-input'], $attributes)
            ) }}
            {{ Form::label("{$name}_{$key}", $value, ['class' => 'form-check-label']) }}
        </div>
    @endforeach
</div>
@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
