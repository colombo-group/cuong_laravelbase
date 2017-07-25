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
        <h1 class="title-cate">Pages</h1>
        <div class="container">
            <ul class="list-post">
                @foreach($list as $item)
                    @php
                        if(Auth::guest()) {
                            $route = route('show',['id' => $item->id]);
                        } else {
                            $route = route('page.show',['id' => $item->id]);
                        }
                    @endphp
                    <li class="row">
                        <a href="{{$route}}" class="link-img"><img src="{{asset($item->image)}}" alt="{{$item->title}}"></a>
                        <div class="info">
                            <h2 class="title"><a href="{{$route}}">{{$item->title}}</a></h2>
                            <p class="summary">{{$item->summary}}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="pani">
                {!! $list->links() !!}
            </div>
        </div>
    </div>
@endsection