<x-app-layout>

    <body style="padding-top:30px">
        <div class="container">
            <div class="category m-4">
                <p class="title">Kategori</p>
                <div class="row" style="gap:1rem;">
                    @foreach ($categories as $cat)
                        <a href="?category={{$cat->slug}}"
                            class="col-sm-3 p-2 m-2 d-flex flex-column align-items-center shadow-sm catColumn">
                            <img class="align-self-center hover-scale"
                                src="https://cdn.discordapp.com/attachments/1163489620005224503/1168180643176386580/New_Project_1.png?ex=655a0e81&is=65479981&hm=7df5f06702f692aba62b58cc8cc83718ce1834edcd5017806fe5608d7e13511f&"
                                width="75%" height="75%" alt="Deskripsi Gambar">
                            <p class="align-self-center d-flex">{{ $cat->nama_kategori }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
            <hr />
            <div class="newest m-4">
                <p class="title">Yang Terbaru</p>
                <div class="row">
                    <div class="row" style="gap:2rem;">
                        @foreach ($products as $product)
                            <a href="/product/{{$product->id}}"
                                class="col-sm-3 d-flex flex-column align-items-center shadow-sm productList">
                                <div class="card product p-3">
                                    <img class="card-img-top hover-scale"
                                        src="https://cdn.discordapp.com/attachments/1163489620005224503/1168180643176386580/New_Project_1.png?ex=655a0e81&is=65479981&hm=7df5f06702f692aba62b58cc8cc83718ce1834edcd5017806fe5608d7e13511f&"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="nama">{{ $product->nama_produk }}</p>
                                        <p class="harga"> Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>


</x-app-layout>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .body {
        font-family: 'Roboto';
    }

    .hover-scale:hover {
        transform: scale(1.05);
        transition: transform 0.1s ease-in;
    }

    .container {
        /* background-color: black !important; */
        max-width: 1200px;
        min-width: 1200px;
        /* border: 2px solid black;  */
        padding: 20px;
        overflow-x: auto;
    }

    .category {}

    .title {
        font-size: 28px;
        font-weight: bold;
        color: #3c0f83;
        padding: 10px 0;
    }

    .catColumn {
        background-color: white;
        border: 1px solid black;
        border-radius: 10px;
        text-decoration: none;
        color: #3c0f83;
        font-size: 24px;
    }

    .catColumn:hover {
        font-weight: bold;
        color: #3c0f83;
    }

    .product {
        border: none;
    }

    .productList {
        background-color: white;
        border: 2px solid #c8b8df;
        border-radius: 10px;
        min-width: 180px;
        text-decoration: none;
        max-width: 100%;
    }

    .productList:hover {
        font-weight: 900;
        border: 2px solid #3c0f83;
    }

    .nama {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Menampilkan teks hingga 2 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        color: black;
        font-size: 18px;
    }

    .harga {
        font-size: 22px;
        color: #3c0f83;
        font-weight: 900;
    }
</style>
