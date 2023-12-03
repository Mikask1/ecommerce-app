<x-app-layout>

    <body style="margin-top:50px;">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="box">
            <div class="container">
                <h1 style="margin-bottom: 16px">
                    @if ($mode == 'create')
                        Create Product
                    @elseif($mode == 'edit')
                        Edit Product
                    @endif
                </h1>
                <form
                    action="{{ $mode == 'create' ? route('product.create') : route('product.update', ['id' => $product->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($mode == 'edit')
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label>Nama produk</label>
                        <input class="form-control" name="nama_produk" id="nama_produk"
                            placeholder="Enter your product name"
                            value="{{ $mode == 'edit' ? $product->nama_produk : '' }}">
                    </div>

                    <div class="form-group">
                        <label>Gambar produk</label>
                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" name="gambar"
                            id="gambar">
                        @if ($mode == 'edit' && $product->gambar)
                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="Product Image"
                                class="full-width-image">
                        @endif
                        <p>Max: 2MB</p>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi produk</label>
                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi"
                            placeholder="Enter your product description">{{ $mode == 'edit' ? $product->deskripsi : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga produk</label>
                        <input class="form-control" type="number" name="harga" id="harga" placeholder="0"
                            value="{{ $mode == 'edit' ? $product->harga : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi produk</label>
                        <div class="select-wrapper">
                            <select id="kondisi" name="kondisi" class="form-control">
                                <option value="Baru"
                                    {{ $mode == 'edit' && $product->kondisi == 'Baru' ? 'selected' : '' }}>Baru
                                </option>
                                <option value="Bekas"
                                    {{ $mode == 'edit' && $product->kondisi == 'Bekas' ? 'selected' : '' }}>Bekas
                                </option>
                            </select>
                            <div class="select-icon"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Stok produk</label>
                        <input class="form-control" type="number" name="stok" placeholder="0"
                            value="{{ $mode == 'edit' ? $product->stok : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori produk</label>
                        <div class="select-wrapper">
                            <select id="kategori" name="kategori" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->nama_kategori }}"
                                        {{ $mode == 'edit' && $category->nama_kategori == $product->kategori ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="select-icon"></div>
                        </div>
                    </div>

                    <div class="submit">
                        <button type="submit"
                            class="btn btn-primary">{{ $mode == 'edit' ? 'Edit' : 'Submit' }}</button>
                    </div>
                </form>
            </div>

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

            .full-width-image {
                width: 100%;
                height: auto;
                object-fit: contain;
                margin: 8px 0px;
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
                padding: 8px 16px;
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
                text-align: right;
                padding-bottom: 30px;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            `integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>

    </body>

</x-app-layout>
