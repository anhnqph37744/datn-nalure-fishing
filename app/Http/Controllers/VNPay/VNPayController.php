<?php
namespace App\Http\Controllers\VNPay;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class VNPayController extends Controller
{
    public function VNpay_Payment($amount, $language, $vnp_IpAddr, $vnp_TxnRef)
    {
        $vnp_TmnCode = "5RWJ4H0U"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "USPLQVHYKRYZBLWMZQEKXHXNLVNNSQZB"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
        $vnp_Amount = $amount;
        $vnp_Locale = $language;
        $vnp_BankCode = 'VNBANK';

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();
    }
    public function handleReturn(Request $request)
    {
        if($request->query('vnp_ResponseCode') == '00'){
            $order = Order::find(intval($request->query('vnp_TxnRef')));
            $order->payment_status = 'success';
            $order->save();
            return redirect()->route('order.success', ['id' => $order->id])
            ->with('success', 'Đặt hàng thành công!');
        }else{
            return redirect()->route("home")
            ->with('error', 'Thanh toán thất bại !');
        }
    }

}
