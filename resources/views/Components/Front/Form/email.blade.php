<div class="form-group">
    {{ Form::label($label, null) }}
    {{ Form::email(
        $name,
        $defaultValue,
        array_merge(['class' => 'form-control'], $attributes)
    ) }}
</div>
@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
