@extends('index')

@section('css')
    <link href="{{ asset('css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endsection


<?php isset($data) ? $route = route('post.update', [$data->id]) : $route = route('post.store') ?>

@section('content')
    {!! formBegin($route) !!}

    {!! dtEditText($label = 'Tiêu đề', $sizeLabel = 2, $name = 'title',$value = @$data -> title, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập tên tiêu đề', $rowsTextarea = 0, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditSelectbox($label = 'Danh mục', $sizeLabel = 2, $name = 'cate_id', $value = @$data->cate_id, $widthSelect = 6, $heightSelect = 1, $array_select = @$cates, $field_value = 'id', $field_label = 'name', $sizeHeight = 0, $multi = 0, $add_fisrt_option = 0, $comment = '', $sizeComment = 0) !!}

    {!! dtEditImage($label = 'Ảnh đại diện', $sizeLabel = 2, $name = 'image', $value = @$data->image ? asset(@$data->image) : asset('images/no-image-small.jpg'), $sizeInput = 6, $comment = '', $sizeComment = 0) !!}

    {!! dtEditSelectbox($label = 'Công bố', $sizeLabel = 2, $name = 'published', $value = @$data->published, $widthSelect = 6, $heightSelect = 1, $array_select = $published, $field_value = 'id', $field_label = 'name', $sizeHeight = 0, $multi = 0, $add_fisrt_option = 0, $comment = '', $sizeComment = 0) !!}

    {!! dtEditText($label = 'Tóm tắt', $sizeLabel = 2, $name = 'summary',$value = @$data -> summary, $type = 'text', $sizeInput = 6, $placeholder = 'Nhập nội dung tóm tắt', $rowsTextarea = 4, $commet = '', $sizeComment = 4, $editor = 0) !!}

    {!! dtEditText($label = 'Nội dung', $sizeLabel = 2, $name = 'content',$value = @$data -> content, $type = 'text', $sizeInput = 8, $placeholder = 'Nhập nội dung chi tiết', $rowsTextarea = 4, $commet = '', $sizeComment = 0, $editor = 1) !!}

    {!! isset($data->image) ? addInputHidden('image_path_old', $data->image) : '' !!}

    <div class="col-md-6 col-md-offset-2" style="padding-left: 5px;">
        <input type="submit" class="btn btn-success" value="Lưu">
        <a href="{!! route('post.index') !!}" class="btn btn-default">Trở về</a>
    </div>
    {!! formEnd(@$data) !!}
@endsection

@section('script')
    <script src="{{ asset('js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    @push('scripts')
    <script>
        tinymce.init({
            selector: 'textarea.editor',
            height: 200,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
    @endpush
@endsection

