<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <title>Tiệm Sách Ếch Con</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="active/image/Ech Con.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="active/css/style.css">
</head>
<x-header />

<body>
    <div style="background-color: green;">
        <div class="py-5">
            <div class="container center py-5" style="background-color: white; border-radius: 15px 50px 30px;">
                <div class="row">
                    <div class="col-md-4">
                        @if (auth('cus')->check())
                        <form action="" method="POST" role="form" class="py-5">
                            @csrf
                            <h2>Thông tin người đặt</h2>
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" value="{{ $auth->name}}" name="name"
                                    placeholder="Nhập họ và tên">

                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{ $auth->email}}" name="email"
                                    placeholder="Nhâp email">

                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ $auth->phone}}" name="phone"
                                    placeholder="Nhập số điện thoại">

                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Địa Chỉ</label>
                                <input type="text" class="form-control" value="{{ $auth->address}}" name="address"
                                    placeholder="Nhập địa chỉ">

                                @error('address')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Ghi chú đơn hàng</label>
                                <input type="text" class="form-control" name="note" placeholder="Nhập ghi chú">

                                @error('note')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Đặt hàng</button>
                        </form>
                        @else
                        <form action="{{ route('login') }}" method="POST" role="form" class="py-5">
                            @csrf
                            <input type="hidden" name="returnUrl" value="order.checkout">
                            <h2 class="pb-3">Login</h2>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Nhập email">

                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Input password">

                                @error('password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Đăng nhập</button>

                            Chưa có tài khoản?<a href="{{ route('register') }}">Click vào đây</a>
                            </br>
                        </form>
                        @endif
                    </div>




                    <div class="col-md-8">
                        <h2 class="pb-5">Review shopping(Total : {{number_format($cart->totalPrice)}}vnđ)</h2>
                        <div>
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

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Bìa sách</th>
                                        <th>Tên sách</th>
                                        <th>Tác Giả</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart->items as $item )
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td><img src="uploads/{{$item->image}}" width="100px"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->author}}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{ number_format($item->quantity * $item->price) }}đ</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>