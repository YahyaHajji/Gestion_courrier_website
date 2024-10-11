<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="App.css">
    <title>Login</title>
</head>

<body class="Login">

    <div class="container">

        <div class="row">

            <div class="col-md-7">
                <form action="{{ route('app.connecter') }}" method="post" class="card">
                    @csrf
                    <div class="card-body d-flex justify-content-center">
                        <div>
                            <div class="d-flex justify-content-center">
                                <img src="images/email.PNG" class="rounded-circle w-60 p-5" alt="iamge">
                            </div>
                            <input type="text" name="user" value="{{ old('user') }}" placeholder="utilisateur"
                                class="form-control w-100"><br>
                            @if (session('FormError'))
                                <span class="text-danger">
                                    {{ session('FormError') }}
                                </span>
                            @endif
                            <input type="password" name="password" placeholder="Mot de passe"class="form-control w-100">
                            <br>
                            <button type="submit" class="btn btn-success w-100">Entrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
