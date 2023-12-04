<x-app-layout>

    <body style="padding-top:30px">

        <div class="container p-5 my-3">

            @foreach($transactions as $transaction)
            <div class="card transaction-card d-flex">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-6 text-start">
                            <h5 class="pt-3 px-3">{{ $transaction->id }}</h5>
                        </div>
                        <div class="col-6 text-end">
                            <p class="pt-3 px-3">{{ $transaction->status }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @foreach($transaction->details as $detail)
                    <div class="product-card d-flex align-items-center">
                        <div class="product-img">
                            <img src="{{ asset('storage/' . $detail->product->gambar) }}" width="60" height="60" class="d-inline-block align-top" alt="{{ $detail->product->name }}">
                        </div>
                        <div class="row product-info d-flex align-items-center mr-2">
                            <h4 class="nama">{{ $detail->product->nama_produk }}</h4>
                            <p>Rp{{ number_format($detail->product->harga, 2) }}</p>
                            <p>x{{ $detail->kuantitas }}</p>
                        </div>
                        <div class="product-actions">
                            <button type="button" class="reviewButton">Buat ulasan</button>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="p-4 justify-content-center">
                    <div class="detailTransaksi align-text-start">
                        <p>Metode pembayaran: {{ $transaction->metode_bayar }}</p>
                        <p>Total harga: {{ $transaction->total_harga }}
                    </div>
                    <div class="detailPengiriman align-text-start">
                        @if($transaction->status === 'PACKING')
                        <p>Tanggal pengemasan: {{$transaction->tanggal_pengemasan }}</p>
                        <p>Tanggal pengiriman: -</p>
                        <p>Tanggal sampai: -</p>
                        @endif
                        @if($transaction->status === 'DELIVERED')
                        <p>Tanggal pengemasan: {{ $transaction->tanggal_pengemasan }}</p>
                        <p>Tanggal pengiriman: {{ $transaction->tanggal_pengiriman }}</p>
                        <p>Tanggal sampai: -</p>
                        @endif
                        @if($transaction->status === 'ARRIVED')
                        <p>Tanggal pengemasan: {{$transaction->tanggal_pengemasan }}</p>
                        <p>Tanggal pengiriman: {{ $transaction->tanggal_pengiriman }}</p>
                        <p>Tanggal sampai: {{ $transaction->tanggal_sampai }}</p>
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
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

    .transaction-card {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        border: 1px solid #3c0f83;
        border-radius: 10px;
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

    
</style>