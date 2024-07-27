<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <title>Tiệm Sách Ếch Con</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="active/image/Ech Con.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="active/css/style.css">
</head>

<body style="background-color: green;" class="container pt-5 mt-5">

    <div class="py-5 mt-5">
        <div>
            <div class="container" style="background-color: white; border-radius: 15px 50px 30px;" class="py-5">
                <div class="container">
                    <div class="py-5">
                        <div id="wrapper">
                            <div id="content-wrapper" class="d-flex flex-column">
                                <div id="content">
                                    <div class="reg container">
                                        <div class="titile-login row justify-content-center mt-5 mb-5">
                                            <h2>
                                                <b>Register Admin</b>
                                            </h2>
                                            @if (Session::has('ok'))
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">&times;</button>
                                                {{Session::get('ok')}}
                                            </div>
                                            @endif

                                            @if (Session::has('no'))
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">&times;</button>
                                                {{Session::get('no')}}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <div class="form-group l-g">
                                                        <label for="">* Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder=" Nhập Name..." name="name">
                                                        @error('name')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group l-g">
                                                        <label for="">* Email</label>
                                                        <input type="email" class="form-control"
                                                            placeholder=" Nhập Email..." name="email">
                                                        @error('email')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group l-g">
                                                        <label for="">* Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder=" Nhập Password...">
                                                        @error('password')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="text-center mt-3 pb-5">
                                                        <button class="btn-success btn-block text-center"
                                                            type="submit">Đăng Kí</button>
                                                        Có tài khoản?<a href="{{ route('admin.login') }}">Click vào đây
                                                            để đăng nhập</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="active/js"></script>
</body>

</html>