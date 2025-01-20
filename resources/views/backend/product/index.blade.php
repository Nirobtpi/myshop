@foreach ($pr as $p)
    @php
        // Decode the JSON string into an associative array
        $data = json_decode($p->tags, true);
        // dd($data)
    @endphp

        @foreach ($data as $item)
            <span class="badge bg-primary">{{ $item['value'] }}</span>
        @endforeach

@endforeach
