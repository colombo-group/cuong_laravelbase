@extends('index')

<?php isset($data) ? $route = route('user.update', [$data->id]) : $route = route('user.store') ?>

@section('content')
    {!! formBegin($route) !!}

    {!! dtEditText($label = 'Name', $sizeLabel = 2, $name = 'name',$value = @$data -> name, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập tên user', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditText($label = 'Username', $sizeLabel = 2, $name = 'username',$value = @$data -> username, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập username', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditText($label = 'Email', $sizeLabel = 2, $name = 'email',$value = @$data -> email, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập email', $rowsTextarea = 0, $commet = '', $sizeComment = 0, $editor = 0) !!}

    {!! dtEditText($label = 'Password', $sizeLabel = 2, $name = 'password',$value = '', $type = 'password', $sizeInput = 6, $placeholder = 'Nhập password', $rowsTextarea = 0, $commet = '', $sizeComment = 0, $editor = 0) !!}

    {!! dtEditText($label = 'Confirm Password', $sizeLabel = 2, $name = 'password_confirmation',$value = '', $type = 'password', $sizeInput = 6, $placeholder = 'Nhập lại password', $rowsTextarea = 0, $commet = '', $sizeComment = 0, $editor = 0) !!}

    {!! dtEditSelectbox($label = 'Quyền truy cập', $sizeLabel = 2, $name = 'role', $value = @$data->role, $widthSelect = 6, $heightSelect = 1, $array_select = $role, $field_value = 'id', $field_label = 'name', $sizeHeight = 0, $multi = 0, $add_fisrt_option = 0, $comment = '', $sizeComment = 0) !!}

    {!! dtEditSelectbox($label = 'Giới tính', $sizeLabel = 2, $name = 'sex', $value = @$data->sex, $widthSelect = 6, $heightSelect = 1, $array_select = [0  => 'Giới tính', 1 => 'Nam', 2 => 'Nữ'], $field_value = 'id', $field_label = 'name', $sizeHeight = 0, $multi = 0, $add_fisrt_option = 0, $comment = '', $sizeComment = 0) !!}

    {!! dtDatePick($label = "Ngày sinh", $sizeLabel = 2, $name = "birthday", $value = @$data->birthday,$sizeInput = 6, $comment = '', $sizeComment = 0) !!}

    {!! dtEditText($label = 'Địa chỉ', $sizeLabel = 2, $name = 'address',$value = @$data -> address, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập địa chỉ', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditText($label = 'Slogan', $sizeLabel = 2, $name = 'slogan',$value = @$data -> slogan, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập slogan', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    <div class="col-md-6 col-md-offset-2" style="padding-left: 5px;">
        <input type="submit" class="btn btn-success" value="Lưu">
        <a href="{!! route('user.index') !!}" class="btn btn-default">Trở về</a>
    </div>
    {!! formEnd(@$data) !!}
@endsection