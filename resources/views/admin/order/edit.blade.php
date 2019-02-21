@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-lg-12">
            @if(session()->has('success'))
                        <div class="alert alert-info">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Chỉnh Sửa Thông Tin Đơn Hàng : {{ $item->order_number }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tên Khách Hàng</td>
                                                <td>{{ $item->customer_name }}</td>

                                            </tr>
                                            <tr>
                                                <td>Ngày Đặt</td>
                                                <td>{{ $item->created_at }}</td>

                                            </tr>
                                            <tr>
                                                <td>Số Điện Thoại</td>
                                                <td>{{ $item->customer_phone }}</td>

                                            </tr>
                                            <tr>
                                                <td>Địa Chỉ</td>
                                                <td>{{ $item->customer_address }}</td>

                                            </tr>
                                            <tr>
                                                <td>Ghi Chú</td>
                                                <td>{{ $item->note }}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
        </div>
        <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên Sản Phẩm</th>
                                                        <th>Số Lượng </th>
                                                        <th>Đơn Giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $index = 1; @endphp
                                                        @foreach($order->product_variants as $product)
                                                        <tr>
                                                            <td>{{ $index }}</td>
                                                            <td>{{ $product->getName() }}</td>
                                                            <td>{{ $product->pivot->amount }}</td>
                                                            <td>{{ $product->getPrice() }}</td>

                                                        </tr>
                                                        @php $index++ @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td><b>Tổng Giá</b></td>
                                                        <td>{{ $order->getTotal() }}vnđ </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE                  -->
        </div>
        <form action="{{ $item->urlAdminUpdate() }}"   method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="_method" value="PUT" /> {{ csrf_field() }}
                    <label class="" for="">Tình Trạng Đơn Hàng :</label>
                    <select class="form-control-sm form-control " name="status" @if($item->order_status ==  config('custom.order_statuses.delivered')) disabled @endif>
                        @foreach($statuses as $key => $status)
                        <option value="{{ $key }}" @if($item->order_status == $key) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-info" type="submit">Lưu</button>
            </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
{{--  @foreach($product as $pro)
                                                        @foreach($pro->product_variants as $pros)
                                                            <tr>
                                                                <td>{{ $index++ }}</td>
                                                                <td>{{ $pros->pivot->name }} - {{ $pro->product_variant->getSizeGuest() }} </td>
                                                                <td>{{ $pro->amount }}</td>
                                                                <td class="process">{{ number_format(($pro->product_variant->price)*($pro->amount)) }}vnđ</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach  --}}
