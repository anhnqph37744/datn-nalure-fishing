@extends('client.layouts.main')
@section('main')
<div class="breadcumb-wrapper" data-bg-src="{{asset('client/assets/img/breadcrumb/breadcrumb-1-1.png')}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Check Out</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Check Out</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="vs-checkout-wrapper space">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="woocommerce-form-login-toggle">
                    <div class="woocommerce-info"><i class="fas fa-info-circle"></i> Returning customer? <a href="#" class="showlogin"> Click here to login</a>
                    </div>
                </div>
                <div class="form-area">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="#" class="form-login">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username or email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="remembermylogin">
                                    <label for="remembermylogin">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="vs-btn shadow-none">Login</button>
                                <p class="fs-xs mt-2 mb-0">
                                    <a class="reset-color" href="#">Lost your password?</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="woocommerce-form-login-toggle">
                    <div class="woocommerce-info"><i class="fas fa-info-circle"></i> Returning customer? <a href="#" class="showlogin"> Click here to login</a>
                    </div>
                </div>
                <div class="form-area">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="#" class="form-login">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Write your coupon code">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="vs-btn">Apply Coupon Code</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
        </div>
        <form action="#" class="woocommerce-checkout mt-40">
            <div class="row ">
                <div class="col-lg-6">
                    <h2 class="h4">Billing Details</h2>
                    <div class="row">
                        <div class="col-12 form-group">
                            <select class="form-select">
                                <option>United Kingdom (UK)</option>
                                <option>United State (US)</option>
                                <option>Equatorial Guinea (GQ)</option>
                                <option>Australia (AU)</option>
                                <option>Germany (DE)</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Your Company Name">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Street Address">
                            <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Town / City">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Country">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Postcode / Zip">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <input type="text" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="col-12 form-group">
                            <input type="checkbox" id="accountNewCreate">
                            <label for="accountNewCreate">Create An Account?</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 checkout-right">
                    <p id="ship-to-different-address">
                        <input id="ship-to-different-address-checkbox" type="checkbox" name="ship_to_different_address" value="1" checked>
                        <label for="ship-to-different-address-checkbox">
                            Ship to a different address?
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    <div class="shipping_address">
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="form-select">
                                    <option>United Kingdom (UK)</option>
                                    <option>United State (US)</option>
                                    <option>Equatorial Guinea (GQ)</option>
                                    <option>Australia (AU)</option>
                                    <option>Germany (DE)</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Your Company Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Street Address">
                                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Town / City">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Country">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Postcode / Zip">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <textarea cols="20" rows="5" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
            </div>
        </form>
        <h4 class="mt-4 pt-lg-2">Your Order</h4>
        <form action="#" class="woocommerce-cart-form">
            <table class="cart_table mb-20">
                <thead>
                    <tr>
                        <th class="cart-col-image">Image</th>
                        <th class="cart-col-productname">Product Name</th>
                        <th class="cart-col-price">Price</th>
                        <th class="cart-col-quantity">Quantity</th>
                        <th class="cart-col-total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cart_item">
                        <td data-title="Product">
                            <a class="cart-productimage" href="shop-details.html"><img width="91" height="91" src="{{asset('client/assets/img/shop/product-2-1.jpg')}}" alt="Image"></a>
                        </td>
                        <td data-title="Name">
                            <a class="cart-productname" href="shop-details.html">Spoon lure tackle Baits</a>
                        </td>
                        <td data-title="Price">
                            <span class="amount"><bdi><span>$</span>18</bdi></span>
                        </td>
                        <td data-title="Quantity">
                            <strong class="product-quantity">01</strong>
                        </td>
                        <td data-title="Total">
                            <span class="amount"><bdi><span>$</span>18</bdi></span>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="checkout-ordertable">
                    <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td data-title="Subtotal" colspan="4"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></td>
                    </tr>
                    <tr class="woocommerce-shipping-totals shipping">
                        <th>Shipping</th>
                        <td data-title="Shipping" colspan="4">
                            Enter your address to view shipping options.
                        </td>
                    </tr>
                    <tr class="order-total">
                        <th>Total</th>
                        <td data-title="Total" colspan="4"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></strong> </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <div class="mt-lg-3">
            <div class="woocommerce-checkout-payment">
                <ul class="wc_payment_methods payment_methods methods">
                    <li class="wc_payment_method payment_method_bacs">
                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                        <label for="payment_method_bacs">Direct bank transfer</label>
                        <div class="payment_box payment_method_bacs">
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_cheque">
                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque">
                        <label for="payment_method_cheque">Cheque Payment</label>
                        <div class="payment_box payment_method_cheque">
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_cod">
                        <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method">
                        <label for="payment_method_cod">Credit Cart <img src="{{asset('client/assets/img/card/all.jpg')}}" alt="image"></label>
                        <div class="payment_box payment_method_cod">
                            <p>Pay with cash upon delivery.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_paypal">
                        <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal">
                        <label for="payment_method_paypal">Paypal</label>
                        <div class="payment_box payment_method_paypal">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                        </div>
                    </li>
                </ul>
                <div class="form-row place-order">
                    <button type="submit" class="vs-btn style-1">Place order</button>
                </div>
            </div>
        </div>
    </div>
</div>

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
