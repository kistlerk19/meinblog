<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('dashboard.layout.head')
</head>

<body class="bg-light">

    @include('dashboard.layout.navbar')

    <div class="container ps-5 pe-5">
        <div class="col-12 p-2 text-left mt-4">
            <h1 class="p-2">{{ $title }}</h1>

            <div class="p-2 mt-4 mb-4 border-bottom-black border-top-black">
                <button type="button" class="btn btn-sm btn-dark" onclick="">
                    New Action
                </button>
            </div>
        </div>
        
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>
