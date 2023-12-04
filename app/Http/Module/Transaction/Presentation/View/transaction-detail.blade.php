<x-app-layout>

    <body style="margin-top:50px">
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
        <div class="container p-5 mb-3">
            <div class="card transaction-card d-flex">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-6 text-start">
                            <h5 class="pt-3 px-3">{{ $transaction->id }}</h5>
                        </div>
                        <div class="col-6 text-end">
                            <p class="pt-3 px-3">
                                <span class="py-2 px-3" style="border-radius: 6px;
                                                @if ($transaction->status == 'PACKING') background-color: white;
                                                    color: black;
                                                @elseif($transaction->status == 'DELIVERING')
                                                    background-color: yellow;
                                                    color: black;
                                                @elseif($transaction->status == 'ARRIVED')
                                                    background-color: green;
                                                    color: white; @endif">
                                    {{ $transaction->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @foreach($transaction->details as $detail)
                    <div class="product-card d-flex align-items-center">
                        <div class="product-img">
                            <img src="{{ asset('storage/' . $detail->product->gambar) }}" width="60" height="60" class="d-inline-block align-top" alt="{{ $detail->product->nama_produk }}">
                        </div>
                        <div class="row product-info d-flex align-items-center mr-2">
                            <h4 class="nama">{{ $detail->product->nama_produk }}</h4>
                            <p>
                                <span class="harga">Rp{{ number_format($detail->product->harga, 2) }}</span>
                                <span style="color:white">.</span>
                                <span class="kuantitas">x{{ $detail->kuantitas }}</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-4 justify-content-center">
                    <div class="detailTransaksi align-text-start">
                        <p>Metode pembayaran: {{ $transaction->metode_bayar }}</p>
                        <p>Total harga: Rp{{ number_format($transaction->total_harga, 2) }}
                    </div>
                    <div class="detailPengiriman align-text-start">
                        @if ($transaction->status === 'PACKING')
                        <p>Tanggal pengemasan: {{ $transaction->tanggal_pengemasan }}</p>
                        <p>Tanggal pengiriman: -</p>
                        <p>Tanggal sampai: -</p>
                        @endif
                        @if ($transaction->status === 'DELIVERING')
                        <p>Tanggal pengemasan: {{ $transaction->tanggal_pengemasan }}</p>
                        <p>Tanggal pengiriman: {{ $transaction->tanggal_pengiriman }}</p>
                        <p>Tanggal sampai: -</p>
                        @endif
                        @if ($transaction->status === 'ARRIVED')
                        <p>Tanggal pengemasan: {{ $transaction->tanggal_pengemasan }}</p>
                        <p>Tanggal pengiriman: {{ $transaction->tanggal_pengiriman }}</p>
                        <p>Tanggal sampai: {{ $transaction->tanggal_sampai }}</p>
                        @endif
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
        transform: scale(1.02);
        transition: transform 0.1s ease-in;
    }

    .card-header {
        background-color: #3c0f83;
        color: white;
        vertical-align: center;
    }

    .card-body {
        border-bottom: 1px solid #3c0f83;
    }

    .product-card {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 20px;
        align-items: center;
        border-bottom: 1px solid #3c0f83;
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

    .product-info .harga {
        color: #3c0f83;
        font-size: 18px;
        font-weight: 900;
    }

    .product-actions .kuantitas {
        color: #333;
        font-size: 18px;
        font-weight: 500;
    }

    .product-actions {
        display: flex;
        align-items: center;
    }

    .product-actions .btn {
        border: 1px solid #3c0f83;
        /* background-color: #c8b8df; */
    }

    .reviewButton {
        font-size: 16px;
        border: 1px solid transparent;
        border-radius: 6px;
        background-color: #3c0f83;
        padding: 8px 12px;
        /* display: inline-block; */
        text-decoration: none;
        color: white;
        width: 100%;
        text-align: center;
    }

    .tambahKeranjang:hover {
        font-weight: bold;
    }

    .detailTransaksi {
        font-size: 18px;
        color: black;
        font-weight: 600;
    }

    .detailPengiriman {
        font-size: 16px;
        color: black;
        font-weight: 400;
    }

    .modal-header {
        background-color: #c8b8df;
    }
</style>