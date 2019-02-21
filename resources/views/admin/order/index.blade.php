@extends('layouts.admin.master')
@section('content')

<div class="row">
        <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body card-block">
                                        <form action="{{ route('search_orders') }}" method="get" class="">
                                            @csrf()
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="col-md-6">
                                                    <input type="text" id="username" name="customer_name" placeholder="Tên Khách Hàng" class="form-control">
                                                    </div>
                                                    <h1>||</h1>

                                                    <div class="col-md-5">
                                                        <div class="col-12">
                                                            <select name="order" id="SelectLm" class="form-control">
                                                                <option value=""></option>
                                                                @foreach(config('custom.order_status_display_be') as $key => $item)
                                                                <option value="{{ $key }}">{{ $item }}</option>
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
    </div>
    <div class="row">

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã Đơn</th>
                                                <th>TT Khách Hàng</th>
                                                <th>Giá</th>
                                                <th>Ngày Đặt</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $index=1 ?>
                                            @foreach($orders as $item)
                                            <tr>

                                                <td>{{ $index++ }}</td>
                                                <td>{{ $item->order_number }}</td>
                                                <td>{{ $item->customerInfo() }}</td>
                                                <td>{{ $item->getTotal() }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->getStatus() }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="{{ $item->urlAdminEdit() }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            @include('admin.order.component.btn_delete')

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="margin-left:15px;">
                                    {{ $orders->links() }}
                                    </div>
                                </div>

                            </div>
        {{-- <div class="col-md-1"></div> --}}
    </div>

@endsection
