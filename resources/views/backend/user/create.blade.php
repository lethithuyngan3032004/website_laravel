@extends('layouts.admin')

@section('title', 'Thêm thành viên')

@section('content')
<!-- CONTENT -->
<section class="content">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Thêm mới thành viên</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                    <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm thành viên
                    </button>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Họ tên (*)</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Giới tính</label>
                                    <input type="text" name="gender" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Điện thoại</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Địa Chỉ</label>
                                    <input type="address" name="address" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Hình đại diện</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Vai Trò</label>
                                    <input type="roles" name="roles" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Xuất bản</option>
                                        <option value="2">Chưa xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>
<!-- END CONTENT-->
@endsection
