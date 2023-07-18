@extends('layouts.master') @section('content')

<main class="relative">
    <div>
        <section>
            <div
                class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8"
            >
                <header>
                    <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                        Product Collection
                    </h2>

                    <p class="max-w-md mt-4 text-gray-500">
                        Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Itaque praesentium cumque iure dicta incidunt est
                        ipsam, officia dolor fugit natus?
                    </p>
                </header>

                <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($products as $product)
                    <li>
                        <div class="block overflow-hidden group">
                            <img
                                src="{{ asset('thumbnail/images/'.$product->thumbnail)}}"
                                alt=""
                                class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                            />

                            <div class="relative p-3 bg-white">
                                <h3
                                    class="text-md text-gray-700 group-hover:underline group-hover:underline-offset-4"
                                >
                                    {{ substr($product->title,0, 10) }}..
                                </h3>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>

                                    <span class="tracking-wider text-gray-900">
                                        {{$product->retail_price}} BDT
                                    </span>
                                </p>
                                <div>
                                    <button
                                        data-product-id="{{$product->id}}"
                                        data-user-id="{{$customer->id}}"
                                        class="cart-btn bg-amber-400 text-white py-3 w-full mt-2"
                                    >
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
    <div
        class="cart-button w-20 h-20 absolute bg-yellow-100 rounded-full grid place-content-center"
    >
        <a href="{{ route('cart') }}" class="">
            <i class="fa-solid fa-cart-shopping text-2xl text-yellow-400"></i>
        </a>
        <!-- badge -->
        <p
            id="badge"
            class="badge hidden whitespace-nowrap rounded-full bg-purple-400 px-2.5 py-2.5 text-sm text-purple-700 absolute right-0"
        ></p>
    </div>
</main>
@endsection
