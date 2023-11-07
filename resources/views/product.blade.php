<x-app-layout>
    <body> 

        <div class="container m-5 mx-auto" style="min-width: 900px; max-width: 900px;">
            <div class="row">
                <div class="kiri col-sm-6 d-flex flex-column align-items-center">
                    <img width="240" height="240" class="productImg" alt="" src="https://images.tokopedia.net/img/cache/900/VqbcmM/2023/10/12/837df084-ea97-4727-8f16-77cf238b8b5a.jpg">
                    <button class="tambahKeranjang">Tambah ke keranjang</button>
                </div>                
                <div class="kanan col-sm-6 d-flex flex-column align-items-center">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="deskripsi-title">L'Oreal Paris Revitalift Triple Action Day Cream Skin Care - 50ml</h4>
                            <div>
                                <div class="tags">
                                    <span class="material-symbols-outlined" style="font-size: 15px; font-variation-settings: 'FILL' 1;">
                                        grade
                                    </span>
                                    Rating
                                </div>
                                <a href="#" class="tags tagsA" >Kategori</a>
                                <a href="#" class="tags tagsA" >Kondisi</a>
                            </div>
                            <h1 class="harga">Rp100.000</h1>
                            <p class="deskripsi-text">
                                L'Oreal Paris Revitalift Triple Action Day Cream Skin Care - 50ml

                                Revitalift Evitalift Laser New Skin Anti-Aging Cream merupakan krim anti-aging yang menandingi treatment laser. Konsentrasi Pro-xylane tertinggi memperbaiki tekstur kulit dan membuat kulit terasa lebih kenyal.
                                Adenosine untuk kulit terasa lebih kencang.
                                Ceramide Pro mengoptimalkan kualitas kulit dan kekenyalan kulit.

                                LHA (Capryloyl Salicylic Acid) mempermudah penyerapan bahan aktif dengan mempercepat regenerasi kulit. Sejak pemakaian awal, kulit terasa lembab. Tekstur kulit terasa halus. Dengan pemakaian teratur, garis halus dan pro tersamarkan. Kulit terasa lebih kencang.
                            </p>
                        </div>
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

.kanan h4{
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