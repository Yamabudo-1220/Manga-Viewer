<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    public function index(){
        $response = Http::get('https://api.mangadex.org/manga', [
            'limit' => 5,
            'order[rating]' => 'desc',
            'includes[]' => 'cover_art',
        ]);

        $manga = $response->json()['data'];

        $latestMangaResponse = Http::get('https://api.mangadex.org/manga', [
            'limit' => 50,
            'order[updatedAt]' => 'desc',
            'includes[]' => 'cover_art',
        ]);

        $latestManga = $latestMangaResponse->json()['data'];

        return view('manga.index', compact('manga', 'latestManga'));
    }       

    public function show($id){
        $mangaResponse = Http::get("https://api.mangadex.org/manga/{$id}", [
            'includes[]' => 'cover_art',
        ]);

        $manga = $mangaResponse -> json()['data'];

        $chapterResponse = Http::get('https://api.mangadex.org/chapter', [
            'manga' => $id,
            'translatedLanguage[]' => 'en', 
            'order[chapter]' => 'desc',
            'limit' => 100,
        ]);

        $chapter = $chapterResponse -> json()['data'];

        return view('manga.show', compact('manga', 'chapter'));
    }
}
