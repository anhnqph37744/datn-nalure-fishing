<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiAIController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $customerQuestion = $request->input('message');

        $products = Product::with('category')
        ->select('id','price', 'name', 'image', 'weight', 'quantity', 'sku')
        ->get();
        $productListJSON = $products->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $prompt = [
            [
                "parts" => [
                    ["text" => "Bạn là một trợ lý bán hàng thông minh trên website thương mại điện tử.
                    Nhiệm vụ của bạn là tư vấn sản phẩm phù hợp nhất cho khách hàng dựa trên câu hỏi và danh sách sản phẩm dưới dạng JSON.

                    Hướng dẫn khi phản hồi:
                    - Phân tích kỹ nhu cầu của khách hàng dựa vào câu hỏi.
                    - Duyệt qua danh sách sản phẩm để tìm sản phẩm phù hợp nhất.
                    - Giải thích lý do sản phẩm được chọn là phù hợp (ví dụ: về chất liệu, tính năng, giá, kiểu dáng…).
                    - Chỉ giới thiệu các sản phẩm có trong danh sách.
                    - Trình bày bằng văn phong thân thiện, dễ hiểu, không dùng từ chuyên ngành quá mức.
                    - Gợi ý tối đa 3 sản phẩm tốt nhất kèm mô tả ngắn gọn.
                    - **Phản hồi sử dụng định dạng HTML đơn giản** (ví dụ: dùng thẻ `<b>`, `<ul>`, `<li>`, `<br>`, v.v...) để trình bày rõ ràng, dễ đọc.
                    - trả về data càng đẹp càng tốt , sản phầm thì kèm theo hình ảnh nhé , product có hình ảnh đÓ , cái gì cần hightlight cứ cho nổi hẳn lên nhé
                    - tư vấn đÚng danh mục khách cần nhé ( mồi câu khác cần câu )
                    - hiển thị sản phẩm thì khi khách ấn vào ảnh thì phải ra đc sản phẩm chi tiết đó url /product-detail/:id
                    - nếu khách có câu cảm ơn hoặc theo dạng tạm biệt thì cảm ơn khách đã ghé website nhé k cần tư vấn nữa
                    - thêm animation vào giá nha kiểu sốc ấy thêm icon animation kiểu sale hay hot cũng đc
                    Dưới đây là danh sách sản phẩm (dưới dạng JSON):

                    {$productListJSON}

                    Câu hỏi của khách hàng:

                    \"{$customerQuestion}\"

                    Hãy trả lời với vai trò là một nhân viên tư vấn chuyên nghiệp nhưng thân thiện . Không cần nói lại câu hỏi của khách hàng."]
                            ]
            ]
        ];


        $apiKey = env('GEMINI_API_KEY');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey", [
            "contents" => $prompt
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
