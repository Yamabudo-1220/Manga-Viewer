<!DOCTYPE html>
<html>
    <head>
        <title>Manga Chapters</title>

        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>
    <body class="body">

        @php
            $title = $manga['attributes']['title']['ja'] ?? collect($manga['attributes']['title'])->first();
        @endphp

        <h1>{{ $title }}</h1>

        <h2>📚 Chapters</h2>
        <ul>
            @foreach ($chapter as $chap)
                @php
                    $chapTitle = $chap['attributes']['title'] ?? 'No Title';
                    $chapNumber = $chap['attributes']['chapter'] ?? 'N/A';
                @endphp
                <li>
                    Chapter {{ $chapNumber }}: {{ $chapTitle }}
                </li>
            @endforeach
        </ul>
        
    </body>
</html>