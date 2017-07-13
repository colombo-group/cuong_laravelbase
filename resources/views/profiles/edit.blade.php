@extends('index')

@section('content')
    {!! formBegin(route('profile.upda')) !!}

    {!! dtEditText($label = 'Tên', $sizeLabel = 2, $name = 'name',$value = @$data -> name, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập tên', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditSelectbox($label = 'Giới tính', $sizeLabel = 2, $name = 'sex', $value = @$data->sex, $widthSelect = 6, $heightSelect = 1, $array_select = [0  => 'Giới tính', 1 => 'Nam', 2 => 'Nữ'], $field_value = 'id', $field_label = 'name', $sizeHeight = 0, $multi = 0, $add_fisrt_option = 0, $comment = '', $sizeComment = 0) !!}

    {!! dtDatePick($label = "Ngày sinh", $sizeLabel = 2, $name = "birthday", $value = @$data->birthday,$sizeInput = 6, $comment = '', $sizeComment = 0) !!}

    {!! dtEditText($label = 'Địa chỉ', $sizeLabel = 2, $name = 'address',$value = @$data -> address, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập địa chỉ', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditText($label = 'Slogan', $sizeLabel = 2, $name = 'slogan',$value = @$data -> slogan, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập slogan', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    <div class="col-md-6 col-md-offset-2" style="padding-left: 5px;">
        <input type="submit" class="btn btn-success" value="Lưu">
    </div>

    {!! formEnd(@$data) !!}
@endsection
