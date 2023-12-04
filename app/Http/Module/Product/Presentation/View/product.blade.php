<x-app-layout>
    <body style="margin-top:50px;">
        @if (session('status'))
            <div class="alert alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="container mx-auto" style="min-width: 900px; max-width: 900px; margin-top:4rem;">
            <div class="row">
                <div class="kiri col-sm-6 d-flex flex-column align-items-center">
                    <img width="240" height="240" class="productImg" src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                    <form method="POST" action="{{ route('product.add_to_cart') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value=1>
                        <button type="submit" class="tambahKeranjang">Tambah ke keranjang</button>
                    </form>
                    </div>
                <div class="kanan col-sm-6 d-flex flex-column align-items-center">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="deskripsi-title">{{ $product->nama_produk }}</h4>
                            <div>
                                <div class="tags">
                                    <span class="material-symbols-outlined" style="font-size: 15px; font-variation-settings: 'FILL' 1;">
                                        grade
                                    </span>
                                    {{ $product->rating }}
                                </div>
                                <a href="#" class="tags tagsA">{{ $product->kategori }}</a>
                                <a href="#" class="tags tagsA">{{ $product->kondisi }}</a>
                            </div>
                            <h1 class="harga">Rp{{ number_format($product->harga, 0, ',', '.') }}</h1>
                            <p class="deskripsi-text">
                                {{ $product->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
                <h4 class="deskripsi-text" style="padding-bottom:10px;">Reviews</h4>
                @foreach ($product->reviews as $review)
                <div>
                    <div class="tags" style="display: inline">
                        <span class="material-symbols-outlined" style="font-size: 15px; font-variation-settings: 'FILL' 1;">
                            grade
                        </span>
                        {{ $review->rating }}
                    </div>
                    <h6 class="deskripsi-text" style="display: inline">Anonymous</h6>
                    <p style="color:black;padding:10px;">{{ $review->review }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </body>
</x-app-layout>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .body {
        font-family: 'Roboto';
    }

    .container {
        color: white !important;
    }

    .productImg {
        border: 2px solid transparent;
        margin: 10px 0;
    }

    .productImg:hover {
        border: 2px solid #3c0f83;
    }

    .kiri {
        width: 40%;
        overflow-x: auto;
        padding-right: 30px;
    }

    .kanan {
        /* width: 50%;  */
        width: 60%;
        overflow-x: auto;
        padding-left: 30px;
    }

    .kanan .card {
        background: transparent;
        border: 1px solid transparent;
        /* padding: 20px; */
    }

    .kanan h4 {
        color: black;
        font-weight: bold;
        padding-bottom: 10px;
    }

    .tags {
        font-size: 16px;
        border: 1px solid black;
        border-radius: 6px;
        background-color: rgb(227, 227, 227);
        padding: 3px 6px;
        display: inline-block;
        text-decoration: none;
        color: black;
        margin-right: 10px;
    }

    .tagsA:hover {
        color: #3c0f83;
    }

    .harga {
        color: black;
        padding-top: 10px;
        font-weight: bold;
    }

    .deskripsi-text {
        color: black;
        padding-top: 20px;
    }

    .tambahKeranjang {
        font-size: 15px;
        border: 1px solid transparent;
        border-radius: 6px;
        background-color: #3c0f83;
        padding: 5px 10px;
        /* display: inline-block; */
        text-decoration: none;
        color: white;
        width: 90%;
        text-align: center;
        margin: 30px 0;
    }

    .tambahKeranjang:hover {
        font-weight: bold;
    }
</style>