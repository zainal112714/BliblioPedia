<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BliblioPedia</title>

	<!-- Bootstrap CSS v5.2.1 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"/>
	<style>
			.container {
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            @media (min-width: 768px) {
                .container {
                    width: 750px;
                }
            }
            @media (min-width: 992px) {
                .container {
                    width: 970px;
                }
			}
			@media (min-width: 1200px) {
                .container {
                    width: 1170px;
                }
            }



		@media (max-width: 767px) {
			#featureContainer .carousel-inner .carousel-item > div {
				display: none;
			}
			#featureContainer .carousel-inner .carousel-item > div:first-child {
				display: block;
			}
		}

		#featureContainer .carousel-inner .carousel-item.active,
		#featureContainer .carousel-inner .carousel-item-next,
		#featureContainer .carousel-inner .carousel-item-prev {
			display: flex;
		}

		/* medium and up screens */
		@media (min-width: 768px) {

			#featureContainer .carousel-inner .carousel-item-end.active,
			#featureContainer .carousel-inner .carousel-item-next {
				transform: translateX(25%);
			}

			#featureContainer .carousel-inner .carousel-item-start.active,
			#featureContainer .carousel-inner .carousel-item-prev {
				transform: translateX(-25%);
			}
			#featureContainer .card img{
				width: 90%;
				height: 40vh;
			}
			#featureContainer .carousel-item{
				justify-content: space-between;
			}
		}
		@media (max-width: 767px) {
			#featureContainer .card img{
				width: 100%;
				height: 75vh;
			}
		}
		#featureContainer .carousel-inner .carousel-item-end,
		#featureContainer .carousel-inner .carousel-item-start {
		transform: translateX(0);
		}
		#featureContainer .card{
			border: 0;
		}
		#featureContainer .card{
			position: relative;
		}
		#featureContainer .card .card-img-overlays{
			position: absolute;
			bottom: 15%;
			left: 10%;
		}
		#featureContainer a{
			text-decoration: none;
		}
		#featureContainer .indicator{
			border: 1px solid rgb(202, 202, 202);
			padding: 3px 6px 3px 6px;
		}
		#featureContainer .indicator:hover{
			background-color: blue;
			border: 1px solid blue;
			transition: 200ms;
		}
		#featureContainer .indicator:hover{
			color: white;
			transition: 200ms;
		}
		#featureContainer .indicator {
			color: lightgray;
		}
		#featureContainer .float-end{
			padding-top: 10px;
		}
	</style>
</head>
<body>
@include('layouts.nav')
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

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<hr></hr>
	<div class="container my-3 mt-5" id="featureContainer">
		<div class="row mx-auto my-auto justify-content-center">
			<div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">
				<h2 class="font-weight-light float-start mt-5">Koleksi Buku</h2>
				<div class="float-end pe-md-4">
					<a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
						<span class="fas fa-chevron-left" aria-hidden="true"></span>
					</a> &nbsp;&nbsp;
					<a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
						<span class="fas fa-chevron-right" aria-hidden="true"></span>
					</a>
				</div>
				<div class="carousel-inner" role="listbox">
                    @foreach ( $books as $book )
                    <div class="carousel-item active">
						<div class="col-md-3">
							<div class="card d-flex">
								<div class="card-img">
									<img src="{{ asset($book->images) }}" class="img-fluid">
								</div>
								<h5 class="card-title">{{$book->title}}</h5>
                            <p class="card-text">{{$book->synopsis}}</p>
                        <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-primary">Detail</a>
							</div>
						</div>
					</div>
                    @endforeach
				</div>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
	<script>
		let items2 = document.querySelectorAll('#featureContainer .carousel .carousel-item');

		items2.forEach((el) => {
			const minPerSlide = 4
			let next = el.nextElementSibling
			for (var i=1; i<minPerSlide; i++) {
				if (!next) {
					// wrap carousel by using first child
					next = items2[0]
				}
				let cloneChild = next.cloneNode(true)
				el.appendChild(cloneChild.children[0])
				next = next.nextElementSibling
			}
		})
		$(document).ready(function(){
			$('#featureCarousel').carousel({interval: false});
			$('#featureCarousel').carousel('pause');
		});
	</script>
</body>
</html>
