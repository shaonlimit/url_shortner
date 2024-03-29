<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">
        <title>Laravel URL Shortner</title>
    </head>

    <body class="vh-100 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Register
                    </div>
                    <form action="{{ route("register.store") }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <label for="name">Name:</label>
                                    <input name="name" type="text" class="form-control" placeholder='Enter name'>
                                    @if ($errors->has("name"))
                                        <p class="text-danger">{{ $errors->first("name") }}</p>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="email">Email:</label>
                                    <input name="email" type="email" class="form-control" placeholder='Enter email'>
                                    @if ($errors->has("email"))
                                        <p class="text-danger">{{ $errors->first("email") }}</p>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="password">Password:</label>
                                    <input name="password" type="password" class="form-control" placeholder='Enter password'>
                                    @if ($errors->has("password"))
                                        <p class="text-danger">{{ $errors->first("password") }}</p>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-success">Register</button>
                                </div>
                                <div class="col-md-12 text-center">
                                    <p>Already have an account? <a href="{{ route("login") }}"> Login</a></p>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</html>
