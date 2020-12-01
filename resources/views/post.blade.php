@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="float-right">
            <form action="{{route('post.search')}}" method="get">
                <div class="float-left">
                    <input
                        id="searchKey"
                        name="searchKey"
                        value="{{request()->query('searchKey')}}"
                        type="text"
                        class="form-control"
                        placeholder="Search"
                    >
                </div>
                <div class="float-right pl-3">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
        <div class="row m-auto">
{{--            @dd($posts)--}}
            @foreach($posts as $post)
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="text-center text-info">{{$post->category->name}}</h4>
                        </div>
                        <img src="{{$post->photo}}" class="card-img-top" alt="...">
                        <div class="card-body bg-white">
                            <h5 class="card-title text-justify" style="height: 200px">{{$post->title}}</h5>
                            <p class="card-text text-justify"> {{ Str::limit($post->postDescription->description, 150) }}</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

{{--        <div class="text-center">--}}
{{--            @php--}}
{{--                $querystringArray = [--}}
{{--                    'searchKey' => request()->query('searchKey'),--}}
{{--                ];--}}
{{--            @endphp--}}
{{--            {{ $posts->appends($querystringArray)->links() }}--}}
{{--        </div>--}}
    </div>
@endsection
