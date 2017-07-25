@extends('index')

@section('content')
    <?php
    $list_config[] = array('title'=>'Name','field'=>'name','ordering'=> 0, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Email','field'=>'email','ordering'=> 0, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Giới tính','field'=>'sex','ordering'=> 0, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Ngày sinh','field'=>'birthday','ordering'=> 0, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Địa chỉ','field'=>'address','ordering'=> 0, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Slogan','field'=>'slogan','ordering'=> 0, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Action','type'=>'restore', 'align'=>'center');
    $list_config[] = array('title'=>'Ngày tạo','field'=>'created_at','ordering'=> 0, 'type'=>'datetime');
    $list_config[] = array('title'=>'Id','field'=>'id','ordering'=> 0, 'type'=>'text', 'align'=>'center');
    ?>

    {!! genarateFormLiting($link_restore = 'user.restore', $prefix = 'user' , $list, '', $list_config, @$sort_field, @$sort_direct, $list->links()) !!}
    @push('scripts')
        <script>
            $('.delete_recode').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{!! url('admin/user/delete/' ) !!}" + "/" + id,
                    success: function( msg ) {
                        if(msg.deleted) {
                            window.location.href = "{{route('user.list_rashed')}}";
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
