@extends('layouts.admin.master')
@section('content')

    <div class="row">
        <div class="col-md-12">

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Tên Danh Mục</th>
                                                <th>Thông Tin </th>
                                                <th>Trạng Thái</th>
                                                <th>Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($categories->count())
                                            @foreach($categories as $item)
                                            <tr>

                                                <td>{{ $item->name }}</td>
                                                <td>{!! substr($item->description,0,100)!!}...</td>
                                                <td>{{ $item->getStatus() }}</td>
                                                <td>

                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="{{ $item->urlAdminEdit() }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            @include('admin.category.component.btn_delete')

                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            Không Tìm Thấy Danh Mục Nào
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
        </div>
    </div>
@endsection
