<table class="table">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row['data'] as $data)
                    <td>{{ $data }}</td>
                @endforeach
                <td>
                    @foreach ($row['actions'] as $action)
                        <a href="{{ $action['url'] }}"
                            class="btn btn-{{ $action['type'] ?? 'primary' }}">{{ $action['label'] }}</a>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
