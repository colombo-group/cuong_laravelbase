@extends('index')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Chúc mừng <strong>{{ Auth::user()->name }}</strong> đã đăng nhập thành công</h3></div>
    </div>
@endsection
