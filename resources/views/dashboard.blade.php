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

    <body class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <a href="{{ route("logout") }}" class="btn btn-info btn-sm text-white">Logout</a>
            <h1>Hello, {{ auth()->user()->name }}</h1>
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">

                    <form action="{{ route("store") }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="link" type="text" class="form-control" placeholder="Enter URL...." aria-label="Enter URL...." aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-success text-white">Generate Shorten URL</button>
                            </div>

                        </div>
                        @if ($errors->has("link"))
                            <p class="text-danger">{{ $errors->first("link") }}</p>
                        @endif
                    </form>
                </div>

                <div class="col-md-12 mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Main URL</th>
                                <th>Shorten URL</th>
                                <th>Visits</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td><a href="{{ $link->destination_url }}" target="_blank">{{ $link->destination_url }}</a></td>
                                    <td><a href="{{ $link->default_short_url }}" target="_blank">{{ $link->default_short_url }}</a></td>
                                    <td>{{ $link->track_visits }}</td>
                                    <td>
                                        <a href="{{ route("delete", $link->id) }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</html>
