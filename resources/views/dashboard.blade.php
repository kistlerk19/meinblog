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
            <h1 class="fw-bold fs-1">Dashboard</h1>
            <p>Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie,
                wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und
                Netzwerksicherheit schützen können.</p>
        </div>
        
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
