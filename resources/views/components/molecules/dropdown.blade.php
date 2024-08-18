<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ $label }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        {{ $slot }}
    </div>
</div>
