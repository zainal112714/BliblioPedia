@extends('layouts.app')

@section('content')
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">git 
            <div class="carousel-item active">
                <img src="{{ asset('images/cin.jpeg') }}" class="d-block w-100" alt="cin">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Rayakan Hari Istimewa!</h5>
                    <p>Tidak usah bingung bagaimana caranya merayakan ulang tahun!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/nov.jpeg') }}" class="d-block w-100" alt="nov">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Give The Best Gift!</h5>
                    <p>Berikan Kejutan untuk Orang Tersayang!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/zen.jpeg') }}" class="d-block w-100" alt="zen">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Chat and Order to Us!</h5>
                    <p>Tunggu apalagi? Pesan Sekarang!</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- About -->
    <div class="bg-light mt-5" id="About">
        <div class="container py-5 px-4">
            <div class="row">
                <div class="col-md-5 order-md-2">
                    <img class="img-fluid" src="{{ asset('images/mainlogo.png') }}" alt="main logo">
                </div>
                <div class="col-md-7 order-md-1">
                    <h1 class="mt-4 display-3">Rayakan Hari Istimewa Anda!</h1>
                    <p class="fs-5 mt-3">Melayani kebutuhan hari perayaan seperti dekorasi, party suply, event organizer dan
                        special effect. Melayani customer lebih dari 10 tahun, "Baloon Bunga Bali" dipercaya membuat hari
                        istimewa menjadi semakin istimewa. Tunggu apa lagi? Custom sekarang!</p>
                </div>
            </div>
        </div>
    </div>
    <center>
        <h1 class="mt-4">Koleksi Buku Terpopuler</h1>
    </center><br><br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 12rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="style.css">
@endsection
