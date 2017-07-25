@extends('index')

@section('content')
    <a href="{!! route('post.create') !!}" class="btn btn-success" style="margin: 0px 0px 20px 15px;"> Thêm </a>
    <?php
    $list_config[] = array('title'=>'Tiêu đề','field'=>'title','ordering'=> 0, 'type'=>'text','col_width' => '40%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Action','type'=>'edit', 'align'=>'center');
    $list_config[] = array('title'=>'Ngày tạo','field'=>'created_at','ordering'=> 0, 'type'=>'datetime');
    $list_config[] = array('title'=>'Id','field'=>'id','ordering'=> 0, 'type'=>'text', 'align'=>'center');
    ?>

    {!! genarateFormLiting($link_edit = 'post.edit', $prefix = 'user' , $list, '', $list_config, @$sort_field, @$sort_direct, $list->links()) !!}
    @push('scripts')
    <script>
        $('.delete_recode').click(function() {
            var id = $(this).data('id');
            $.ajax({
                type: "DELETE",
                url: "{!! url('post/' ) !!}" + "/" + id,
                success: function( msg ) {
                    if(msg.deleted) {
                        window.location.href = "{{route('post.list')}}";
                    }
                }
            });
        });
    </script>
    @endpush
@endsection
