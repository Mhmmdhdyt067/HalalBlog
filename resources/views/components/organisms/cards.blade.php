<div class="row">
    @foreach ($cards as $card)
        <div class="col-md-4 mb-4">
            <x-molecules.card>
                <x-slot name="header">{{ $card['header'] }}</x-slot>
                {{ $card['body'] }}
                <x-slot name="footer">{{ $card['footer'] }}</x-slot>
            </x-molecules.card>
        </div>
    @endforeach
</div>
