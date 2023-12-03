<x-app-layout>

    <body style="padding-top:50px">

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

        <div class="container">
            <table class="table table-hover table-responsive table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="col-sm-1 text-center">ID</th>
                        <th scope="col" class="col-sm-2 text-center">Status</th>
                        <th scope="col" class="col-sm-2 text-center">Tgl Pesanan</th>
                        <th scope="col" class="col-sm-2 text-center">Tgl Pengemasan</th>
                        <th scope="col" class="col-sm-2 text-center">Tgl Pengiriman</th>
                        <th scope="col" class="col-sm-2 text-center">Tgl Sampai</th>
                        <th scope="col" class="col-sm-2 text-center">Detail</th>
                        <th scope="col" class="col-sm-2 text-center">Edit</th>
                        <th scope="col" class="col-sm-2 text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="text-center">{{ $transaction->id }}</td>
                            <td class="text-center">{{ $transaction->status }}</td>
                            <td class="text-center">{{ $transaction->tanggal_pesanan }}</td>
                            <td class="text-center">{{ $transaction->tanggal_pengemasan }}</td>
                            <td class="text-center">{{ $transaction->tanggal_pengiriman }}</td>
                            <td class="text-center">{{ $transaction->tanggal_sampai }}</td>
                            <td class="text-center">
                                <a href='/transactions/{{ $transaction->id }}' class="btn btn-primary" role="button">
                                    Lihat
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.transaction.update-status', ['transactionId' => $transaction->id]) }}"
                                    class="btn btn-secondary">
                                    Update Status
                                </a>
                            </td>
                            <td class="text-center">
                                <form method="POST"
                                    action="{{ route('admin.transaction.delete', ['id' => $transaction->id]) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-app-layout>


<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .body {
        font-family: 'Roboto';
    }

    .container {
        max-width: 1200px;
        min-width: 1200px;
        padding: 20px;
        overflow-x: auto;
    }

    .table {
        box-shadow: ;
    }

    .detail {
        background-color: #007bff;
        font-weight: 400;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 10px;
    }

    .delete {
        background-color: #dc3545;
        font-weight: 400;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 10px;
    }

    .edit {
        background-color: #3c0f83;
        font-weight: 400;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 10px;
    }

    thead {
        background-color: #aaa;
    }
</style>
