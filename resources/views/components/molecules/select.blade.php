@props(['categories', 'label', 'name', 'class'])

<div class="form-group">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="form-control {{ $class }}">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
