<x-app-layout>

    <body style="padding-top:70px">
        <div class="container">
            <form action="{{ route('transactions.update-status', ['transactionId' => $transaction->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <h5 for="status">Ganti status pesanan</h5>
                    <div class="select-wrapper">
                        <select id="status" name="status" class="form-control">
                            <option value="DELIVERING" {{ $transaction->status == 'DELIVERING' ? 'selected' : '' }}>
                                DELIVERING</option>
                            <option value="ARRIVED" {{ $transaction->status == 'ARRIVED' ? 'selected' : '' }}>ARRIVED
                            </option>
                            <option value="PACKING" {{ $transaction->status == 'PACKING' ? 'selected' : '' }}>PACKING
                            </option>
                        </select>
                        <div class="select-icon"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 8px;">Simpan</button>
            </form>
        </div>
    </body>
</x-app-layout>
