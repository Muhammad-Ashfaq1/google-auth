<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerformanceRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PerformanceController extends Controller {
    public function checkPerformance(PerformanceRequest $request) {
        $apiUrl = config('constant.page_speed_url');
        $response = Http::get($apiUrl, [
            'url' => $request->url,
            'strategy' => strtolower($request->platform),
            'key' => config('constant.google_api_key'),
        ]);

        Log::info('API Response:', ['response' => $response->json()]);
        return response()->json(['performance' => $response->json()['lighthouseResult']['categories']['performance']['score']]);
    }
}
