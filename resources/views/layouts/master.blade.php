<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />
        <!-- fontawesome -->
        <script
            src="https://kit.fontawesome.com/deb5ec3c82.js"
            crossorigin="anonymous"
        ></script>
        <!-- Scripts -->
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->

            @yield('content')
            <!-- Page Content -->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".cart-btn").click(function (event) {
                    event.preventDefault();

                    var product_id =
                        event.target.getAttribute("data-product-id");
                    var user_id = $(".cart-btn").attr("data-user-id");

                    $.ajax({
                        url: "{{route('cart.store')}}",
                        type: "POST",
                        data: { product_id: product_id, user_id: user_id },
                        success: function (response) {},
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                            // Handle errors, if any
                        },
                    });
                });
            });
        </script>
        <script>
            var prvCart = 1;
            const badgeElement = document.getElementById("badge");
            const cartButonElement = document.querySelectorAll(".cart-btn");
            cartButonElement.forEach((button) => {
                button.addEventListener("click", () => {
                    if (badgeElement.classList.contains("hidden")) {
                        badgeElement.classList.add("hidden");
                    }
                });
            });
        </script>

        <!-- for car quanty -->
        <script>
            const quantityElement = document.querySelectorAll("#Qty");
            console.log(quantityElement);
            var qty;
            quantityElement.forEach((element) => {
                element.addEventListener("change", (e) => {
                    currentElement = e.target;
                    qty = e.target.value;
                    currentElement.value = qty;
                    console.log(qty);
                    currentElement.value = qty;
                });
            });
        </script>
    </body>
</html>
