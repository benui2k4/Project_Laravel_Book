<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <title>Liên hệ</title>
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
            <div class="container py-5" style="background-color: white; border-radius: 15px 50px 30px;" class="py-5">

                <div class="row">
                    <div class="col-md-6">
                        <div class="container p-t-140 p-b-140">
                            <form action="" method="POST" role="form">
                                <h2 class="py-3" style="text-align: center;">Liên Hệ</h2>
                                @csrf
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
                                <div class="form-group">
                                    <label for="">* Họ tên</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên...">
                                </div>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">* Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email liên hệ...">
                                </div>
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">* Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
                                </div>
                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">* Nội dung liên hệ</label>
                                    <textarea name="body" id="input" class="form-control" rows="3" placeholder="Nhập nội dung liên hệ vào đây..."></textarea >
                                </div>
                                @error('body')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="active/image/contact.jpg" width="100%">
                    </div>
                </div>
            </div>
        </div>
         <x-footer />
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