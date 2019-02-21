@extends('layouts.admin.master')
@section('content')
<div class="row">
        <div class="col-md-10"> </div>
        <div class="col-md-1">
            <form method="get" action="{{ route('admin_users.create') }}">
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
                                                <th>Email</th>
                                                <th>Chức Vụ</th>
                                                <th>Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $item)
                                            <tr>

                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->getRole() }}</td>
                                                <td>

                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sửa">
                                                           <a href="{{ $item->urlAdminEdit() }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                            @include('admin.user.component.btn_del')

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
