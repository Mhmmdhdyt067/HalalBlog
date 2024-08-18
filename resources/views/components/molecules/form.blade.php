<form action="{{ $action }}" method="{{ $method ?? 'POST' }}">
    @csrf
    {{ $slot }}
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</form>
