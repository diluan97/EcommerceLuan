@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-10"> </div>
        <div class="col-md-1">
            <form method="post" action="{{ route('admin_slide.store') }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-accent" value="Thêm mới" />
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Tên </th>
                                                <th>Hình Ảnh</th>
                                                <th>Trạng Thái</th>
                                                <th>Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sliders as $item)
                                            <tr>

                                                <td>{{ $item->name }}</td>
                                                <td><img src="{{ asset('image/slide/'.$item->image) }}"  style="width:100px;100px" alt=""></td>
                                                <td>{{ $item->getStatus() }}</td>
                                                <td>

                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="{{ $item->urlAdminEdit() }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            @include('admin.slider.component.btn_delete')

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
