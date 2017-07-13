@extends('layouts.app')

@section('content-wrapper')
    @include('sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
@endsection