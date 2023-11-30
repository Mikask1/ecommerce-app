<x-app-layout>

    <body style="padding-top:30px">

        @if (session('status'))
        <div class="alert alert alert-success">
            {{ session('status') }}
        </div>
        @endif


        <div class="container">
            <table class="table table-hover table-responsive table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="col-sm-1 text-center">ID</th>
                        <th scope="col" class="col-sm-4 text-center">Nama</th>
                        <th scope="col" class="col-sm-3 text-center">Harga</th>
                        <th scope="col" class="col-sm-2 text-center">Edit</th>
                        <th scope="col" class="col-sm-2 text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->harga }}</td>

                        <td class="text-center">
                            <button class="btn btn-secondary">
                                Edit
                            </button>
                        </td>
                        <td class="text-center">
                            <form method="POST" action="/product/{{ $product->id }}" onsubmit="return confirm('Are you sure you want to delete this?');">
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


    </body>

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
</style>