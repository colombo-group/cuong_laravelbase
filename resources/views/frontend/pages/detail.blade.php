@php
    if(Auth::guest()) {
        $extends = 'welcome';
    } else {
        $extends = 'index';
    }
@endphp

@extends($extends)

@section('content')
    <div class="container-fluid">
        <h1 class="title-cate">{{$detail->title}}</h1>
        <div class="container">
            <div class="cont">
                <div class="info-author">
                    <img src="{{asset($detail->image)}}" alt="{{$detail->title}}">
                    <span class="author">{{$detail->Users->name}}</span>
                    <span class="date">{{date('d-m-Y', strtotime($detail->updated_at))}}</span>
                </div>
                <div class="decript">
                    <p class="summary">{{$detail->summary}}</p>
                    <div class="detail">
                        {!! $detail->content !!}
                    </div>
                </div>
            </div>
            @if(Auth::id())
                @include('frontend.comment.comment')
            @endif
        </div>
    </div>
@endsection