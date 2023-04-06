<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
</head>

<body class="bg-light">

    @include('layout.navbar')

    <div class="container ps-5 pe-5">
        <div class="col-12 p-2 text-center mt-4 mb-4 border-bottom-black">
            <h1 class="fw-bold fs-1">Willkommen in meinem Cybersicherheits-Blog</h1>
            <p>Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie,
                wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und
                Netzwerksicherheit schützen können.</p>
        </div>

        <div class="row">
            @include("home.post")
            <div class="col-lg-1 col-0">
                {{-- Empty --}}
            </div>
            <div class="col-lg-3 col-12 mt-5 ps-lg-4">
                <div class="row">
                    @include("home.trending")
                    @include("home.recent")
                    @include("home.tag")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 g-0 mt-2">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item @if($page_number === 1) disabled @endif">
                            <a href="/?page={{ $page_number - 1 }}" class="page-link">
                                Prev
                            </a>
                        </li>
                        @for ($i = 0; $i < ceil($total_posts / $page_length); $i++)
                            <li class="page-item @if($page_number === $i + 1) active @endif">
                                <a href="/?page={{ $i + 1 }}" class="page-link">{{ $i + 1 }}</a>
                            </li>                            
                        @endfor
                        <li class="page-item @if($page_number >= ceil($total_posts / $page_length)) disabled @endif">
                            <a href="/?page={{ $page_number + 1 }}" class="page-link">
                                Next
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
