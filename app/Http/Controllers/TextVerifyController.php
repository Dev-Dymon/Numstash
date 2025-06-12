<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ViewErrorBag;
use View;

class TextVerifyController extends Controller
{
    public function get_service_list()
    {
        $response = Http::withToken(env('TEXTVERIFY_API_KEY'))->get(env('TEXTVERIFY_BASE_URL'));
        $data = $response->json();

        $services = $data['data']['temporary']['United States'] ?? [];
        return view('user.dashboard', compact('services'));
    }
}
