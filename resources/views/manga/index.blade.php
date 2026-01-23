<!DOCTYPE html>
<html>
<head>
    <title>Manga Viewer</title>
    <style>
        body {
            background: #0f0f0f;
            color: white;
            font-family: Arial;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
        }
        .card {
            background: #1a1a1a;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }
        img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>🔥 Popular Manga</h1>

<div class="grid">
@foreach ($manga as $item)
    @php
        $title = $item['attributes']['title']['en']
            ?? collect($item['attributes']['title'])->first();
    @endphp

    <div class="card">
        <div>{{ $title }}</div>
    </div>
@endforeach
</div>

</body>
</html>