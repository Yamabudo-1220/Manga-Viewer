<!DOCTYPE html>
<html>
<head>
    <title>Manga Viewer</title>

     <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

<div class="container">
    <h1 class="headline">🔥 Top 5 most Popular by Rating</h1>
    <div class="ratingGrid">
        @foreach ($manga as $item)
            @php
                $title = $item['attributes']['title']['ja'] ?? collect($item['attributes']['title'])->first();
            @endphp

            @php
                $cover = collect($item['relationships'])->firstWhere('type', 'cover_art');
                $coverFile = $cover['attributes']['fileName'] ?? null;
                $coverUrl = $coverFile ? "https://uploads.mangadex.org/covers/{$item['id']}/{$coverFile}.256.jpg" : null;
            @endphp

            <div class="card">
                <a id="mangaTitle" href="/manga/{{ $item['id'] }}">
                    @if ($coverUrl)
                        <img src="{{ $coverUrl }}" alt="{{ $title }}">
                    @else
                        <div style="height:220px; background:#333;"></div>
                    @endif

                    <div>{{ $title }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    <h1 class="headline">🆕 Latest Updated Manga</h1>
        <div class="latestUpdateGrid">
        @foreach ($latestManga as $latestItem)
            @php
                $latestTitle = $latestItem['attributes']['title']['ja'] ?? collect($latestItem['attributes']['title'])->first();
            @endphp

            @php
                $cover = collect($latestItem['relationships'])->firstWhere('type', 'cover_art');
                $coverFile = $cover['attributes']['fileName'] ?? null;
                $coverUrl = $coverFile ? "https://uploads.mangadex.org/covers/{$item['id']}/{$coverFile}.256.jpg" : null;
            @endphp

            <div class="latestUpdateCard">
                <a id="mangaTitle" href="/manga/{{ $latestItem['id'] }}">
                    @if ($coverUrl)
                        <img src="{{ $coverUrl }}" alt="{{ $latestTitle }}">
                    @else
                        <div style="height:220px; background:#333;"></div>
                    @endif

                    <div>{{ $latestTitle }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>