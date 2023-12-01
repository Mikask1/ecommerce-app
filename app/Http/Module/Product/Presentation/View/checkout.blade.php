<x-app-layout>

    <body>

        <div class="box">
            <div class="container">

                <h2>
                    Checkout
                </h2>

                <form action="/create_transaction" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach($checkoutData as $data)
                    <div class="row receipt justify-content-between align-items-center">
                        <div class="col-7 namaProduk">
                            <h5>{{ $data['product']->nama_produk }}</h5>
                        </div>
                        <div class="col-3">
                            <p>
                                Rp{{ number_format($data['product']->harga, 2) }}
                            </p>
                            <p>
                                x{{ $data['quantity'] }}
                            </p>
                        </div>

                    </div>
                    @endforeach

                    <div class="row receipt justify-content-between align-items-center">
                        <div class="col-7 namaProduk">
                            <h5>Total pembayaran ({{ $totalQuantity }} produk):</h5>
                        </div>
                        <div class="col-4">
                            <h5>
                                Rp{{ number_format($totalPrice, 2) }}
                            </h5>
                        </div>
                    </div>

                    <div class="metodeBayar">
                        <h5>Metode pembayaran</h5>
                        <div class="select-wrapper">
                            <select id="metode_bayar" name="metode_bayar" class="form-control">
                                <option selected value="0">COD</option>
                                <option value="1">QRIS</option>
                                <option value="2">Paylater</option>
                                <option value="3">BANK</option>
                            </select>
                            <div class="select-icon"></div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="bayar">
            <button type="submit" class="btn btn-dark">Lakukan pembayaran</button>
        </div>

        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

            .body {
                font-family: 'Roboto';
            }

            .container {
                max-width: 550px;
                min-width: 550px;
                padding: 20px;
                overflow-x: auto;
                border-radius: 10px;
                padding: 40px;
                margin: 20px auto;
                box-shadow: 0 0 10px rgba(33, 31, 43, 0.2);
            }

            h2 {
                text-align: center;
                font-size: 25px;
                color: #3c0f83;
                font-weight: 700;
                padding-bottom: 10px;
            }

            .receipt {
                text-align: center;
                padding-top: 15px;
                border-top: 1px solid #3c0f83;
            }

            .receipt h5 {
                font-size: 15px;
                font-weight: 500;
                color: #333;
            }

            .receipt p {
                font-size: 10px;
                color: #4c617b;
            }

            .submit {
                text-align: center;
                padding-bottom: 30px;
            }

            .bayar {
                text-align: center;
            }

            .namaProduk {
                text-align: left !important;
            }

            .metodeBayar h5 {
                padding-top: 20px;
                font-size: 15px;
                font-weight: 500;
                color: #333;
            }

            .select-wrapper {
                position: relative;
            }

            .select-icon {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                width: 40px;
                /* Adjust the width as needed */
                background: #fff;
                /* Background color for the icon container */
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none;
                /* Allows clicking through the icon */
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .select-icon::before {
                content: '\25BC';
                /* Unicode arrow-down character */
                font-size: 16px;
                /* Adjust the size as needed */
            }

        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" `integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>

    </html>
</x-app-layout>