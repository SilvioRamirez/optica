@php
    $cartCount = 0;
    $cart = session()->get('cart', []);
    foreach ($cart as $item) {
        $cartCount += $item['cantidad'];
    }
@endphp

<a href="{{ route('carrito.index') }}" class="tw-relative tw-text-gray-600 hover:tw-text-teal-600 tw-transition tw-duration-300 tw-no-underline tw-flex tw-items-center tw-gap-1">
    <i class="fas fa-shopping-cart tw-text-xl"></i>
    <span 
        id="cart-count" 
        class="tw-absolute tw--top-2 tw--right-2 tw-bg-teal-500 tw-text-white tw-text-xs tw-font-bold tw-rounded-full tw-w-5 tw-h-5 tw-flex tw-items-center tw-justify-center {{ $cartCount > 0 ? '' : 'tw-hidden' }}"
    >
        {{ $cartCount }}
    </span>
</a>


