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
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/cin.jpeg') }}" class="d-block w-100" alt="cin">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Buku adalah cermin jiwa.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/nov.jpeg') }}" class="d-block w-100" alt="nov">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Jika Anda tidak suka membaca, Anda belum menemukan buku yang tepat.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/zen.jpeg') }}" class="d-block w-100" alt="zen">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ada lebih banyak harta karun di dalam buku daripada di semua jarahan bajak laut di Pulau Harta
                        Karun.</h5>
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
    <div class="bg-about mt-5" id="About">
        <div class="container py-5 px-4">
            <div class="row">
                <div class="col-md-5 order-md-2">
                    <img class="img-fluid" src="{{ asset('images/mainlogo.png') }}" alt="main logo">
                </div>
                <div class="col-md-7 order-md-1">
                    <h1 class="mt-4 display-3">BLIBLIOPEDIA</h1>
                    <p class="fs-5 mt-3">Selamat datang Admin Blibliopedia!</p>
                    <p class="fs-5 mt-3">Website ini dirancang khusus untuk admin agar dapat membantu pencatatan dalam
                        peminjaman dan pengembalian buku di perpustakaan. Website blibliopedia memiliki tujuan utama yaitu
                        untuk pengalaman yang lebih baik, efektif dan efisien bagi admin perpustakaan. Sehingga pustakawan
                        atau admin tidak perlu melakukan administrasi buku perpustakaan secara manual.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Koleksi Buku Popular --}}
    <div class="bg-popular">
        <div class="container text-center">
            <h1 class="mt-5" id="Popular">Koleksi Buku Terpopuler</h1><br><br>
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 12rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                            <a href="#" class="btn">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
