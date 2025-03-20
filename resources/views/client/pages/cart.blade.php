@extends('client.layouts.main')
@section('main')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Cart</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space">
        <div class="container">
            <div class="vs-cart-wrapper">
                <div class="notices-wrapper">
                    <div class="message"><i class="far fa-check-square"></i> Shopping Cost Updated </div>
                </div>
                <form action="#" class="cart-form mb-60">
                    <table class="cart_table mb-60">
                        <thead>
                            <tr>
                                <th class="cart-col-image">Image</th>
                                <th class="cart-col-productname">Product Name</th>
                                <th class="cart-col-price">Price</th>
                                <th class="cart-col-quantity">Quantity</th>
                                <th class="cart-col-total">Total</th>
                                <th class="cart-col-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $c)
                                <tr class="cart_item">
                                    <td data-title="Product">
                                        <a class="cart-productimage" href="{{ route('detail', $c->id_product) }}">
                                            <img src="{{ $c->image }}" alt="Image">
                                        </a>
                                    </td>
                                    <td data-title="Name">
                                        <a class="cart-productname"
                                            href="{{ route('detail', $c->id_product) }}">{{ $c->name }}</a>
                                    </td>
                                    <td data-title="Price">
                                        <span class="amount">
                                            <bdi>
                                                <span>{{ number_format($c->price, 0, ',', '.') }} đ</span></bdi>
                                        </span>
                                    </td>
                                    <td data-title="Quantity">
                                        <div class="quantity product-quantity">
                                            <button class="quantity-minus qut-btn">
                                                <i class="far fa-minus"></i>
                                            </button>
                                            <input type="number" class="qty-input" value="1" min="1"
                                                max="99">
                                            <button class="quantity-plus qut-btn"><i class="far fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td data-title="Total">
                                        <span class="amount">
                                            <bdi>
                                                <span>{{ number_format($c->total, 0, ',', '.') }} đ</span></bdi>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('remove-cart', $c->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button style="border:none; background:none; cursor:pointer;">
                                                <i class="fal fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach



                            <tr>
                                <td colspan="6" class="actions">
                                    <div class="vs-cart-coupon">
                                        <input type="text" class="form-control" placeholder="Coupon Code...">
                                        <button type="submit" class="vs-btn">Apply Coupon</button>
                                    </div>
                                    <button type="submit" class="vs-btn">Update cart</button>
                                    <a href="shop-details.html" class="vs-btn">Continue Shopping</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </section>

    <section class="bg-body space-title">
        <div class="container">
            <div class="subscribe">
                <div class="row gx-0 align-items-center justify-content-between z-index-common ">
                    <div class="col-xl-auto">
                        <p class="sec-subtitle mb-0">Newsletter</p>
                        <h2 class="sec-title h1 text-white">Get Regular Update</h2>
                    </div>
                    <div class="col-xl-auto">
                        <form action="#" class="form-style">
                            <div class="row align-items-center">
                                <div class="form-group mb-0 col">
                                    <input type="text" placeholder="Enter your email address....">
                                </div>
                                <div class="col-md-auto col-12">
                                    <button class="vs-btn w-100">Subscribe <i class="fab fa-telegram-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
