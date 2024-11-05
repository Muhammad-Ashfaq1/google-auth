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
        $data = $response->json();
        Log::info('API Response:', ['response' => $data]);
        $score = @$data['lighthouseResult']['categories']['performance']['score'] ?? 0;
        return response()->json(['performance' => $score * 100]);
    }
}
