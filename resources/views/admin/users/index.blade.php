@extends('index')

@section('content')
    <?php
    $list_config[] = array('title'=>'Name','field'=>'name','ordering'=> 1, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Email','field'=>'email','ordering'=> 1, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Giới tính','field'=>'sex','ordering'=> 1, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Ngày sinh','field'=>'birthday','ordering'=> 1, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Địa chỉ','field'=>'address','ordering'=> 1, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Slogan','field'=>'slogan','ordering'=> 1, 'type'=>'text','col_width' => '10%', 'align'=>'left','arr_params'=>array('size'=> 30));
    $list_config[] = array('title'=>'Ngày tạo','field'=>'created_at','ordering'=> 1, 'type'=>'datetime');
    $list_config[] = array('title'=>'Id','field'=>'id','ordering'=> 1, 'type'=>'text', 'align'=>'center');
    ?>

    {!! genarateFormLiting($link = 'home', $link_edit = 'home', $prefix = 'user' , $list, '', $list_config, @$sort_field, @$sort_direct, $list->links()) !!}
@endsection