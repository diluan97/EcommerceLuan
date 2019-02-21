@extends('layouts.admin.master')
@section('content')

<div class="row">
        <div class="col-md-10">
                                <div class="card">

                                    <div class="card-body card-block">
                                        <form action="{{ route('search_products') }}" method="get" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="col-md-6">
                                                    <input type="text" id="username" name="product_name" placeholder="Tên Sản Phẩm" class="form-control">
                                                    </div>
                                                    <h1>||</h1>

                                                    <div class="col-md-4">
                                                        <div class="col-12">
                                                            <select name="cateProduct" id="SelectLm" class="form-control">
                                                                <option value=""></option>
                                                                @foreach($category as $item)

                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-sm">Tìm Kiếm</button>

                                                </div>
                                            </div>
                                            <div class="form-actions form-group">

                                            </div>
                                        </form>
                                    </div>
                                </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                                    <div class="card-body card-block">
                                        <form method="post" action="{{ route('admin_products.store') }}" class="">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-info" value="Thêm mới" />
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">

                                            </div>
                                        </form>
                                    </div>
                                </div>
        </div>
    </div>
    {{--  <div class="row">
        <div class="col-md-10"> </div>
        <div class="col-md-1">
            <form method="post" action="{{ route('admin_products.store') }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-accent" value="Thêm mới" />
            </form>
        </div>
    </div>  --}}
    <div class="row">
        <div class="col-md-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Danh Mục</th>
                                                <th>Tình Trạng</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $index=1 ?>
                                            @foreach($products as $item)
                                            <tr>

                                                <td>{{ $index++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->category['name'] }}</td>
                                                <td>{{ $item->getHot() }}</td>
                                                <td>{{ $item->getStatus() }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="{{ $item->urlAdminEdit() }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Thêm Biến Thể">
                                                            <a href="{{ route('admin_product_variant.index',['product_slug' => $item->slug]) }}">
                                                                <i class="fa fa-plus-square"></i>
                                                            </a>
                                                        </button>
                                                            @include('admin.products.component.btn_delete')

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    {{ $products->links() }}
                                </div>
                            </div>
        {{-- <div class="col-md-1"></div> --}}
    </div>

@endsection
