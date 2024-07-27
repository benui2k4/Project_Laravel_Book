<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="active/image/Ech Con.png" type="image/x-icon">
    <meta name="author" content="">
    <title>Admin Ếch Con</title>
    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">
        <x-nav />
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-adminheader />
                <div class="grid-margin stretch-card">
                    <div class="card position-relative mx-auto">
                        <div class="card-body p-4">
                            <h2 class="h3 mb-0 text-gray-800 py-5"> List Product</h2>
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
                            <div id="detailedReports"
                                class="carousel slide detailed-report-carousel position-static pt-2"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a href="{{route('product.create')}}" class="btn btn-success pull-right"><i
                                                class="fa fa-plus"></i> Add New Product
                                        </a>
                                        <div class="py-3">
                                            <form
                                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">
                                                    <input class="form-control bg-light border-0 small" name="keyword"
                                                        placeholder="Search for..." aria-label="Search"
                                                        aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="submit">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <table class="table container">
                                            <thead>
                                                <tr style="font-size: larger;">
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Tác Giả</th>
                                                    <th>Giá</th>
                                                    <th>Giảm giá</th>
                                                    <th>Bìa</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $pr)
                                                <tr>
                                                    <td scope="row">{{$pr->id}}</td>
                                                    <td>{{$pr->name}}</td>
                                                    <td>{{$pr->author}}</td>
                                                    <td>{{number_format($pr->price)}} VND</td>
                                                    <td>{{$pr->sale_price}} VND</td>
                                                    <td><img src="uploads/{{$pr->image}}" alt="" width="70px"
                                                            height="70px"></td>
                                                    <td class="text-right">
                                                        <form action="{{ route('product.delete', $pr->id) }}"
                                                            method="post">
                                                            @csrf @method('DELETE')
                                                            <a href="{{ route('product.edit', $pr->id) }}"
                                                                class="btn btn-primary"><i class="fa fa-edit"></i>
                                                                Edit</a>
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')"><i
                                                                    class="fa fa-trash"></i>
                                                                Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr>
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-pageTop />

    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="asset/js/sb-admin-2.min.js"></script>
    <script src="asset/vendor/chart.js/Chart.min.js"></script>
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>