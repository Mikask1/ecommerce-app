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
                        <th scope="col" class="col-sm-2 text-center">ID</th>
                        <th scope="col" class="col-sm-2 text-center">Tanggal</th>
                        <th scope="col" class="col-sm-2 text-center">Status</th>
                        <th scope="col" class="col-sm-2 text-center">Detail</th>
                        <th scope="col" class="col-sm-2 text-center">Edit</th>
                        <th scope="col" class="col-sm-2 text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">23/11/2023</td>
                        <td class="text-center">Sedang dikemas</td>
                        <td class="text-center">
                            <button type="button" class="detail">
                                Lihat pesanan
                            </button>
                        </td>
                        <td class="text-center">
                            <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#gantiStatus">
                                Ganti status pesanan
                            </button>
                        </td>
                        <td class="text-center">
                            <button type="button" class="delete">
                                Batalkan pesanan
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="gantiStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ganti status pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="/createProduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select id="kondisi" name="kondisi" class="form-control">
                                        <option selected value="0">Baru</option>
                                        <option value="1">Bekas</option>
                                    </select>
                                    <div class="select-icon"></div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="edit">Simpan</button>
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

    .detail:hover {
        font-weight: 500;
    }

    .edit:hover {
        font-weight: 500;
    }

    .delete:hover {
        font-weight: 500;
    }
</style>