<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeTro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    {{-- header --}}
    @include('components.header');

    {{-- Main content --}}
    <div class="row ">
        <div class="col-md-2">
            <div class="list-route">
                <ul class="list-group list-group-flush" id="list-route">
                </ul>
            </div>
        </div>
        <div class="col-md-10 ">
            <div class="container-fluid route-list-information">
                <div class="border-all route-1">
                    <div class="route-wrapper bg-ligth p-3 card mt-5">
                        <div class="route-name rounded-pill d-inline-block" id="route-name">

                        </div>

                        <div class="route card-body">
                            <div class="row" id="station-node">                             
                            </div>

                            <div class="row" id="station-name">
            
                            </div>
                    </div>
                    <div class="card-footer text-center">
                        <span class="badge rounded-pill text-bg-secondary" id="route-time"></span>
        
                        <span class="badge rounded-pill text-bg-secondary" id="route-length"></span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer');

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
