<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary w-100">
            <div class="container-fluid">
                <img src="./img/logo/logo2.png" alt="" class="navbar-brand">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <hr>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Back to Home</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="row">
            <div class="box1 col-md-6 col-sm-12">

            </div>
            <div class="box2 col-md-6 col-sm-12">

                <div class="w-100">
                    <p class="header-text">Sign in to Portal</p>
                </div>
                <div class="form">
                    <form action="" method="post">
                        <div class="mb-3">
                            <div class="l d-flex justify-content-between">
                                <label for="">Email</label>
                                <!-- <p class="error">Invalid email</label> -->
                            </div>
                            <input type="email" name="email" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <div class="l d-flex justify-content-between">
                                <label for="">Password</label>
                                <!-- <p class="error">Invalid Password</label> -->
                            </div>
                            <input type="email" name="email" class="form-control" id="">
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="mb-3" id="showPassword">
                            <p class="px-2">Show Password</p>
                        </div>
                        <div class="mb-3 float-end mt-3 mb-5">
                            <a href="" class="nav-links text-muted"
                                style="text-decoration: none; font-size: 13px">Forget Password?</a>
                        </div>
                        <div class="mb-3 mt-5">
                            <button class="btn w-100 p-2">Sign in</button>
                        </div>
                    </form>
                </div>
                <div class="hjjh w-50 p-4 m-auto text-center nav-links" style= "box-shadow: 0px 0px 30px rgba(0, 0, 0, .1)">
                    <a href="apply-addmission" class="text" style="color: purple;text-decoration: none; font-size: 14px">New Student ? Apply for Addmission</a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
</body>

</html>