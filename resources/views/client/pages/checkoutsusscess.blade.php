@extends('client.layouts.main')
@section('main')
<div class="breadcumb-wrapper" data-bg-src="{{asset('client/assets/img/breadcrumb/breadcrumb-1-1.png')}}">

<h1>Đặt hàng thành công</h1>
<p>Mã đơn hàng của bạn: {{ $order->code }}</p>
<p>Trạng thái thanh toán: {{ $order->payment_status }}</p>