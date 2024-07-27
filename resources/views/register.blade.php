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

<x-header />

<body>

    <div style="background-color: green;" class="py-5">
        <div>
            <div class="container" style="background-color: white; border-radius: 15px 50px 30px;" class="py-5">
                <div class="container">
                    <form action="" method="POST" role="form" class="py-5">
                        @csrf
                        <h2 style="text-align: center;">Register</h2>

                        <div class="form-group">
                            <label for="">* Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Input name">

                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">* Email</label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Input email">

                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">* Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Input phone">

                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">* Address</label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Input address">

                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">* Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Input password">

                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">* Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"
                                placeholder="Confirm password">

                            @error('confirm_password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng Kí</button>
                        Có tài khoản?<a href="{{ route('order.checkout') }}">Click vào đây
                            để đăng nhập</a>
                    </form>
                </div>
            </div>
        </div>
        <x-footer />
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