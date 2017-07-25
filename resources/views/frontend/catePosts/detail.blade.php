@extends('index')

<?php isset($data) ? $route = route('cate-post.update', [$data->id]) : $route = route('cate-post.store') ?>

@section('content')
    {!! formBegin($route) !!}

    {!! dtEditText($label = 'Name', $sizeLabel = 2, $name = 'name',$value = @$data -> name, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập tên danh mục post', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    <div class="col-md-6 col-md-offset-2" style="padding-left: 5px;">
        <input type="submit" class="btn btn-success" value="Lưu">
        <a href="{!! route('cate-post.index') !!}" class="btn btn-default">Trở về</a>
    </div>
    {!! formEnd(@$data) !!}
@endsection