<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PostController extends Controller
{
    public function index()
    {
        
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        
        if ($response->successful()) {
            
            return response()->json($response->json(), 200);
        }

        
        return response()->json(['error' => 'Unable to fetch posts'], 500);
    }

    public function show($id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);

        
        if ($response->successful()) {
            
            return response()->json($response->json(), 200);
        }

        
        return response()->json(['error' => 'Unable to fetch post'], 500);
    }

}
