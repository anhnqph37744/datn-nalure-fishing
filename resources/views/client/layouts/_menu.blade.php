<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="index.html"><img src="{{ asset('client/assets/img/logo.svg') }}" alt="Marino"></a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="index.html">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home One</a></li>
                        <li><a href="index-2.html">Home Two</a></li>
                        <li><a href="index-3.html">Home Three</a></li>
                        <li><a href="index-4.html">Home Four</a></li>
                        <li><a href="index-5.html">Home Five</a></li>
                    </ul>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li class="menu-item-has-children">
                    <a href="shop.html">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-with-sidebar.html">Shop With Sidebar</a></li>
                        <li><a href="shop-details.html">Shop Details</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Check Out</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="service.html">Service</a>
                    <ul class="sub-menu">
                        <li><a href="service.html">Service One</a></li>
                        <li><a href="service-2.html">Service Two</a></li>
                        <li><a href="service-details.html">Service Details</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('client.blog.pages.index') }}">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('client.blog.pages.index') }}">Blog Grid</a></li>
                        <li><a href="{{ route('client.blog.pages.index') }}">Blog Grid Sidebar</a></li>
                        <li><a href="{{ route('client.blog.pages.index') }}">Blog List</a></li>
                        <li><a href="{{ route('client.blog.pages.show', ['slug' => 'example-slug']) }}">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="error.html">Error Page</a></li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
