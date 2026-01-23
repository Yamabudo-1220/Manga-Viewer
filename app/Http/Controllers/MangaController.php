<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    public function index(){
        $response = Http::get('https://api.mangadex.org/manga', [
            'limit' => 12,
            'order[followedCount]' => 'desc',
            'includes[]' => 'cover_art'
        ]);

        $manga = $response->json()['data'];

        return view('manga.index', compact('manga'));
    }       
}
