<x-app-layout>
    
    <body> 

        <div class="container">
            
            <div class="category m-4">
                <p class="title">Kategori</p>
                <div class="row">
                        <a href="#" class="col-sm-3 p-2 m-2 d-flex flex-column align-items-center shadow-sm catColumn">
                            <img class="align-self-center" src="https://cdn.discordapp.com/attachments/1163489620005224503/1168180643176386580/New_Project_1.png?ex=655a0e81&is=65479981&hm=7df5f06702f692aba62b58cc8cc83718ce1834edcd5017806fe5608d7e13511f&" width="75%" height="75%" alt="Deskripsi Gambar">
                            <p class="align-self-center d-flex">Electronics</p>
                        </a>
                </div>
            </div>

            <hr/>

            <div class="newest m-4">
                <p class="title">Yang Terbaru</p>
                <div class="row">
                    <a href="#" class="col-sm-3 d-flex flex-column align-items-center shadow-sm productList">
                        <div class="card product m-1 p-2">
                            <img class="card-img-top" src="https://cdn.discordapp.com/attachments/1163489620005224503/1168180643176386580/New_Project_1.png?ex=655a0e81&is=65479981&hm=7df5f06702f692aba62b58cc8cc83718ce1834edcd5017806fe5608d7e13511f&" alt="Card image cap">
                            <div class="card-body">
                                <p class="nama">L'Oreal Paris Revitalift Triple Action Day Cream Skin Care - 50ml</p>
                                <p class="harga">Rp100.000</p>
                            </div>
                        </div>
                    </a>
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
    /* background-color: black !important; */
    max-width: 1200px; 
    min-width: 1200px;
    /* border: 2px solid black;  */
    padding: 20px;
    overflow-x: auto;
}

.category {
    
}

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
    -webkit-line-clamp: 2; /* Menampilkan teks hingga 2 baris */
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