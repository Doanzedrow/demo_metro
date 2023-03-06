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
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/ticket">Đặt vé</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kiểm tra vé</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <form action="http://127.0.0.1:8000/api/ticket" method="post">
            <fieldset>
                <legend>Đặt vé</legend>
                <!-- <div class="mb-3">
                    <label for="route_id" class="form-label">Tuyến</label>
                    <select name="route_id" class="form-select">
                        <option value="1">Tuyến 1</option>
                        <option value="2" >Tuyến 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="galen" class="form-label">Ga lên</label>
                    <select name="station_id_start" class="form-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                 <div class="mb-3">
                    <label for="station_id_end" class="form-label">Ga xuống</label>
                    <select name="station_id_end" class="form-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div> 
                 <div class="mb-3">
                    <label for="count" class="form-label">Số lượng đặt</label>
                    <input type="number" id="count" name="count">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="phone" name="phone">
                </div> -->
                <div class="mb-3">
                    <input type="text" name="route_id" placeholder="route_id">
                </div>
                <div class="mb-3">
                    <input type="text" name="station_id_start" placeholder="station_id_start">
                </div>
                <div class="mb-3">
                    <input type="text" name="station_id_end" placeholder="station_id_end">
                </div>
                <div class="mb-3">
                    <input type="text" name="count" placeholder="count">
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="phone">
                </div>
                <button type="submit" class="btn btn-primary">Đặt vé</button>
            </fieldset>
        </form>
    </div>
    <footer>

    </footer>

    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./js/app.js"></script>

</body>

</html>