@extends('layouts.admin.master')
@section('content')
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
                                    </div>
                                </div>

                            </div>
        {{-- <div class="col-md-1"></div> --}}
    </div>

@endsection
