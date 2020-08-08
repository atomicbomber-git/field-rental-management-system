@extends("layouts.guest-app")

@section("content")
    <div class="container mt-5 vh-100">
        <div class="mb-3">
            <h1 class="text-primary">
                {{ $tempat_penyewaan->nama }}
            </h1>

            <div class="text-muted font-weight-bold">
                <i class="fas fa-phone"></i> {{ $tempat_penyewaan->no_telepon }}
            </div>

            <p>
                {{ $tempat_penyewaan->alamat }}
            </p>

            <a href="{{ route("tempat-penyewaan.pemesanan-penyewa.create", $tempat_penyewaan) }}"
               class="btn btn-primary btn-block"
            >
                <i class="fas fa-book"></i>
                Buat Pemesanan
            </a>
        </div>

        <div id="foto-carousel"
             class="carousel slide"
             data-ride="carousel"
        >
            <ol class="carousel-indicators">
                <li data-target="#foto-carousel"
                    data-slide-to="0"
                    class="active"
                ></li>
                <li data-target="#foto-carousel"
                    data-slide-to="1"
                ></li>
                <li data-target="#foto-carousel"
                    data-slide-to="2"
                ></li>
            </ol>
            <div class="carousel-inner"
                 role="listbox"
            >
                @foreach($tempat_penyewaan->fotos AS $foto)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img data-src="{{ route("foto.carousel.show", $foto) }}"
                             style="filter: brightness(80%)"
                             alt="{{ $foto->nama }}"
                             src="{{ route("foto.carousel.show", $foto) }}"
                        >
                        <div class="carousel-caption d-none d-md-block">
                            <h3> {{ $foto->nama }} </h3>
                            <p>
                                {{ $foto->deskripsi }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev"
               href="#foto-carousel"
               role="button"
               data-slide="prev"
            >
                <span class="carousel-control-prev-icon"
                      aria-hidden="true"
                ></span>
                <span class="sr-only"> Sebelumnya </span>
            </a>
            <a class="carousel-control-next"
               href="#foto-carousel"
               role="button"
               data-slide="next"
            >
                <span class="carousel-control-next-icon"
                      aria-hidden="true"
                ></span>
                <span class="sr-only"> Selanjutnya </span>
            </a>
        </div>
    </div>
@endsection