<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiAIController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $prompt = $request->input('message');
        $apiKey = env('GEMINI_API_KEY');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey", [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => 'Gemini API lỗi',
                'detail' => $response->json(),
            ], 500);
        }

        $data = $response->json();

        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

        return response()->json([
            'reply' => $reply ?? 'Không có phản hồi từ Gemini',
        ]);

    }
}
