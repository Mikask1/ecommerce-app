<x-app-layout>

    <body style="margin-top:30px;">

        <div class="box">
            <div class="container">

                <form action="/createProduct" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Nama produk</label>
                        <input class="form-control" name="nama_produk" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label>Gambar produk</label>
                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" name="gambar">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi produk</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label>Rating produk</label>
                        <input class="form-control" type="number" pattern="\d+(\.\d{1,2})?" name="rating" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label>Harga produk</label>
                        <input class="form-control" type="number" name="harga" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi produk</label>
                        <div class="select-wrapper">
                            <select id="kondisi" name="kondisi" class="form-control">
                                <option selected value="0">Baru</option>
                                <option value="1">Bekas</option>
                            </select>
                            <div class="select-icon"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Stok produk</label>
                        <input class="form-control" type="number" name="stok" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori produk</label>
                        <div class="select-wrapper">
                            <select id="kategori" name="kategori" class="form-control">
                                <option selected value="0">-</option>
                            </select>
                            <div class="select-icon"></div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="submit">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>

        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

            .body {
                font-family: 'Roboto';
            }

            .container {
                max-width: 800px;
                min-width: 800px;
                padding: 20px;
                overflow-x: auto;
                border-radius: 10px;
                padding: 20px;
                margin: 20px auto;
                box-shadow: 0 0 10px rgba(33, 31, 43, 0.2);
            }

            .top-header {
                margin: 20px 0;
                text-align: center;
            }

            .top-header h5 {
                font-size: 50px;
                font-weight: bold;
                color: #333;
            }

            .top-header p {
                font-size: 20px;
                color: #4c617b;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
            }

            .form-control {
                width: 100%;
                padding: 15px 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
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

            .submit {
                text-align: center;
                padding-bottom: 30px;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" `integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>

</x-app-layout>