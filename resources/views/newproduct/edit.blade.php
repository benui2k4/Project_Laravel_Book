<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="active/image/Ech Con.png" type="image/x-icon">
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
                            <h2 class="h3 mb-0 text-gray-800 py-5"> Edit New Product</h2>
                            <div id="detailedReports"
                                class="carousel slide detailed-report-carousel position-static pt-2"
                                data-ride="carousel">
                                <div class="carousel-inner container">
                                    <div class="carousel-item active">

                                        <form
                                            action="{{ route('newproduct.update', ['newproduct' => $newproduct->id]) }}"
                                            method="POST" role="form" enctype="multipart/form-data">
                                            @csrf @method('PUT')

                                            <div class="form-group">
                                                <label for="">Tên Sản Phẩm</label>
                                                <input type="text" class="form-control" value="{{ $newproduct->name}}"
                                                    name="name" placeholder="Input name">
                                            </div>
                                            @error('name')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for="">Tên Tác Giả</label>
                                                <input type="text" class="form-control" value="{{ $newproduct->author}}"
                                                    name="author" placeholder="Input author">
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="">Bìa Ảnh </label>
                                                <input type="file" class="form-control" name="file">
                                                <br>
                                                <img src="uploads/{{ $newproduct->image}}" width="250px">
                                            </div>
                                            @error('file')
                                            <div class="text-danger"> {{$message}} </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for=""><b>Ngày Xuất Bản</b></label>
                                                <input type="date" class="form-control" name="publication_date"
                                                    placeholder="Input publication_date">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="">Danh Mục </label>
                                                <select name="category_id" id="input" class="form-control">
                                                    <option value="">Chọn danh mục</option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}"
                                                        {{$cat->id == $newproduct->category_id ? 'selected' : ''}}>
                                                        {{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="text-danger"> {{$message}} </div>
                                                @enderror
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                Save</button>
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