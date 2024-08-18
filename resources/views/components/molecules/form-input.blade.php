<div class="form-group">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="form-control {{ $class }}" placeholder="Enter the {{ $placeholder }}">
</div>
