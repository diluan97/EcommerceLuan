@extends('layouts.admin.master')
@section('content')

    <div class="row">
        <div class="col-md-10">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <form action="{{ route('search_categories') }}" method="get" class="">
                                           @csrf()
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="category" id="SelectLm" class="form-control">
                                                                @foreach($categories as $item)

                                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
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
                                        <form method="post" action="{{ route('admin_category.store') }}" class="">
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
            {{--  <form class="form-group" method="post" action="{{ route('admin_category.store') }}">
                {{ csrf_field() }}
                 <div class="input-group">
                     <div class="form-group">
                        <input type="submit" class="btn btn-info btn-sm" value="Thêm mới" />
                     </div>
                 </div>
            </form>  --}}
        </div>
    </div>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        {{-- <div class="col-md-1"></div> --}}
    </div>

@endsection
