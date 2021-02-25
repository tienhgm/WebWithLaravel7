@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('admin/user/store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirm">Xác nhận mật khẩu</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" id="phone">
                    @error('phone')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input class="form-control" type="text" name="address" id="address">
                    @error('address')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nhóm quyền</label>
                    <select class="form-control" id="" name="role">
                        <option value="1">Adminstator</option>
                        <option value="2">Subcriber</option>                        
                    </select>
                </div>

                <button type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection