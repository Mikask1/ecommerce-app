<x-app-layout>

    <body style="padding-top:30px">

        <div class="container p-5 my-3">

            @foreach ($products as $product)
                <div class="product-card d-flex align-items-center">
                    <div class="check">
                        <input class="formcheck" type="checkbox" value="" id="{{ 'product' . $product->id }}">
                    </div>
                    <div class="product-img">
                        <img src="{{ asset('storage/' . $product->gambar) }}" width="60" height="60"
                            class="d-inline-block align-top" alt="{{ $product->name }}">
                    </div>
                    <div class="row product-info d-flex align-items-center mr-2">
                        <h4 class="nama">{{ $product->nama_produk }}</h4>
                        <p>Rp{{ number_format($product->harga, 2) }}</p>
                    </div>
                    <div class="product-actions">
                        <button class="btn" type="button" onclick="decreaseQuantity()">-</button>
                        <input type="text" class="form-control quantityinput" id="quantityInput"
                            aria-label="Quantity" value="{{$product->keranjang_quantity}}"
                            oninput="this.value=this.value.replace(/[^0-9]/g,''); validateQuantity(this)">
                        <button class="btn" type="button" onclick="increaseQuantity()">+</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="fixed-bottom d-flex align-items-stretch bottom">
            <div class="row bottomInfo px-5 py-3 d-flex align-items-center">
                <h5>Total produk: 5</h5>
                <h5>Total harga: Rp100.000,00</h5>
            </div>
            <div class="checkout d-flex align-items-center">
                <p class="px-5">Checkout</p>
            </div>
        </div>

        <script>
            function increaseQuantity() {
                var quantityInput = document.getElementById('quantityInput');
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity < 99) {
                    quantityInput.value = currentQuantity + 1;
                }
            }

            function decreaseQuantity() {
                var quantityInput = document.getElementById('quantityInput');
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                }
            }

            function validateQuantity(input) {
                var value = parseInt(input.value);

                if (isNaN(value) || value < 1) {
                    input.value = 1;
                } else if (value > 99) {
                    input.value = 99;
                }
            }
        </script>

    </body>


</x-app-layout>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .body {
        font-family: 'Roboto';
    }

    .hover-scale:hover {
        transform: scale(1.02);
        transition: transform 0.1s ease-in;
    }

    .product-card {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 20px;
        align-items: center;
        border: 1px solid #3c0f83;
        border-radius: 10px;
    }

    .product-img {
        align-items: center;
        margin: 0 30px;
    }

    .product-info {
        flex: 1;
        display: flex;
        align-items: center;
        /* width: 60%; */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 80%;
        /* margin-right: 10px; */
    }

    .product-info p {
        color: #3c0f83;
        font-size: 18px;
        font-weight: 900;
    }

    .product-actions {
        display: flex;
        align-items: center;
    }

    .product-actions .btn {
        border: 1px solid #3c0f83;
        /* background-color: #c8b8df; */
    }

    .quantityinput {
        width: 62px;
        text-align: center;
        /* background-color: #c8b8df; */
        border: 1px solid #3c0f83;
        margin: 0 5px;
        outline: none;
    }

    .quantityinput:focus {
        border: 2px solid #3c0f83 !important;
        /* outline: none !important; */
        box-shadow: none;
    }

    .formcheck {
        width: 1.4rem;
        height: 1.4rem;
        border: 2px solid #3c0f83;
        border-radius: 5px;
        outline: none;
    }

    .formcheck:focus {
        /* outline: none !important; */
        box-shadow: none;
    }

    .formcheck:checked {
        background-color: #3c0f83 !important;
        border: 2px solid transparent;
        outline: none;
    }

    .bottom {
        display: flex;
        justify-content: space-between;
        /* padding: 20px 0; */
        border-top: 2px solid #3c0f83;
        background-color: white;
    }

    .checkout {
        background-color: #3c0f83;
        color: white;
        font-size: 24px;
        width: 220px;
        justify-content: center;
        border-left: 2px solid transparent;
    }

    .checkout:hover {
        font-weight: bold;
        width: 220px;
        transition: width 0.3s;
    }

    .checkout:active {
        background-color: #c8b8df;
        border-left: 2px solid #3c0f83;
        color: black;
    }
</style>
