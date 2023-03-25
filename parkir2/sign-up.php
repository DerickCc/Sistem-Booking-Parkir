<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Parkir Sun Plaza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylederick.css">
</head>
<style>
    body{
        background: goldenrod;
        overflow: hidden;
    }
    .mid{
        height: 93vh;
    }
</style>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="login.php">E-Parkir Sun Plaza</a>
    </nav>
    <section class="mid">
        <div class="login">
            <form action="functions.php" method="POST">
                <h1 class="text-center mb-4">Sign Up</h1>
                <div class="form-group mb-2 was-validated">
                    <label class="form-label" for="fname">First Name</label>
                    <input class="form-control" type="text" name="fname" id="fname" autocomplete="off" required>
                    <div class="invalid-feedback m-0">
                        Mohon mengisi nama depan Anda
                    </div> 
                </div>
                <div class="form-group mb-2 was-validated">
                    <label class="form-label" for="lname">Last Name</label>
                    <input class="form-control" type="text" name="lname" id="lname" autocomplete="off" required>
                    <div class="invalid-feedback m-0">
                        Mohon mengisi nama belakang Anda
                    </div> 
                </div>
                <form class="needs-validaiton">
                    <div class="form-group mb-2 was-validated">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" autocomplete="off" required>
                        <div class="invalid-feedback m-0">
                            Mohon mengisi email Anda
                        </div> 
                    </div>
                    <div class="form-group mb-2 was-validated">
                        <label class="form-label" for="phone">Phone</label>
                        <input class="form-control" type="tel" name="phone" id="phone" autocomplete="off" required>
                        <div class="invalid-feedback m-0">
                            Mohon mengisi no. telepon Anda
                        </div> 
                    </div>
                    <div class="form-group mb-3 was-validated">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Mohon mengisi password Anda
                        </div> 
                    </div>

                    <!-- <input type="submit" class="btn btn-success w-100 my-2">Sign Up -->
                    <div class="row">
                        <a href="login.php">
                            <button type="submit" class="btn btn-success w-100 my-2">
                                Sign-Up
                            </button>
                        </a>
                    </div>
                </form>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>