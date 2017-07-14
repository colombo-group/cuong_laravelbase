@extends('layouts.app')

@section('content-wrapper')
    @include('sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('alert')
        @yield('content')
    </div>
@endsection