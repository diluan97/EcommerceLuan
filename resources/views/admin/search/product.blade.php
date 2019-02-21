@extends('layouts.admin.master')
@section('content')
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
                                </div>
                            </div>
        {{-- <div class="col-md-1"></div> --}}
    </div>
@endsection
