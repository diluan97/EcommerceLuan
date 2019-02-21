@extends('layouts.admin.master')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="overview-wrap">
            <h1 class="title-1 col-md-12"><span class="role user">Danh dách biến thể của {{ $product->name }}</span></h1>
        </div>
    </div>
        <div class="col-md-2">
            <form method="post" action="{{ route('admin_product_variant.store',['product_slug' => $product->slug]) }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-accent" value="Thêm mới" />
            </form>
        </div>
    </div>
    <div class="row">

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $index=1 ?>
                                            @foreach($variants as $item)
                                            <tr>

                                                <td>{{ $index++ }}</td>
                                                <td>{{ $item->getName() }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->getStatus() }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="{{ $item->urlAdminEdit($product->slug) }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            @include('admin.product_variant.component.btn_delete')

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
