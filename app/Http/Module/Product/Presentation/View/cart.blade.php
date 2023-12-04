<x-app-layout>

    <body style="padding-top:50px">
        <form action="{{ route('checkout') }}" method="post" id="checkoutForm">
            @csrf
            <div class="container p-5 mb-3">
                @foreach ($products as $product)
                    <div class="product-card d-flex align-items-center">
                        <div class="check">
                            <input class="formcheck" type="checkbox" name="selectedProducts[]" value="{{ $product->id }}"
                                onchange="calculateTotals()">
                        </div>
                        <div class="product-img">
                            <img src="{{ asset('storage/' . $product->gambar) }}" width="60" height="60"
                                class="d-inline-block align-top" alt="{{ $product->name }}">
                        </div>
                        <div class="row product-info d-flex align-items-center mr-2">
                            <h4 class="nama">{{ $product->nama_produk }}</h4>
                            <p id="harga_{{ $product->id }}" data-harga="{{ $product->harga }}">
                                Rp{{ number_format($product->harga, 2) }}</p>
                        </div>
                        <div class="product-actions">
                            <button class="btn" type="button"
                                onclick="decreaseQuantity({{ $product->id }})">-</button>
                            <input type="text" class="form-control quantityinput"
                                id="quantityInput_{{ $product->id }}" aria-label="Quantity"
                                value="{{ $product->keranjang_quantity }}"
                                oninput="this.value=this.value.replace(/[^0-9]/g,''); validateQuantity(this)">
                            <button class="btn" type="button"
                                onclick="increaseQuantity({{ $product->id }})">+</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="fixed-bottom d-flex align-items-stretch bottom">
                <div class="row bottomInfo px-5 py-3 d-flex align-items-center">
                    <h5>Total produk: <span id="totalProduk">0</span></h5>
                    <h5>Total harga: <span id="totalHarga">0.00</span></h5>
                </div>
                <button type="submit" class="checkout d-flex align-items-center">Checkout</button>
            </div>
        </form>

        <script>
            function increaseQuantity(productId) {
                var quantityInput = document.getElementById('quantityInput_' + productId);
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity < 1000) {
                    quantityInput.value = currentQuantity + 1;
                    fetch('/product/add_to_cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: 'product_id=' + encodeURIComponent(productId) + '&quantity=1'
                    })
                }

            }

            function decreaseQuantity(productId) {
                var quantityInput = document.getElementById('quantityInput_' + productId);
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                    fetch('/product/add_to_cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: 'product_id=' + encodeURIComponent(productId) + '&quantity=-1'
                    })
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

            const checkboxes = document.querySelectorAll('.formcheck');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', calculateTotals);
            });

            function calculateTotals() {
                let totalProduk = 0;
                let totalHarga = 0;

                const checkboxes = document.querySelectorAll('.formcheck:checked');

                checkboxes.forEach(function(checkbox) {
                    const productIndex = checkbox.value;
                    const quantityInput = document.getElementById('quantityInput_' + productIndex);
                    const hargaElement = document.getElementById('harga_' + productIndex);

                    const quantity = parseInt(quantityInput.value, 10);
                    const harga = parseFloat(hargaElement.getAttribute('data-harga'));

                    totalProduk += quantity;
                    totalHarga += quantity * harga;
                });

                // Update the total produk and total harga in the HTML
                document.getElementById('totalProduk').innerText = totalProduk;
                document.getElementById('totalHarga').innerText = formatCurrency(totalHarga.toFixed(2));
            }

            function formatCurrency(amount) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(amount);
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
        border: none;
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
