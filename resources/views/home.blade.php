@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @include('includes.message')
        @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">
                    @if($image->user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', [ 'filename'=>$image->user->image])}}" class="avatar">
                        </div>
                    @endif
                    <div class="data-user">
                        {{$image->user->name. ' '.$image->user->surname}}
                        <span class="nickname"> {{' | @' . $image->user->nick}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                    <a href="{{route('image.detail', ['id' => $image->id])}}">
                        <img src="{{ route('image.file', ['filename' => $image->image_path])}}" alt="">
                    </a>
                    </div>
                </div>
                <div class="likes">
                    <img src="{{asset('images/heart-grey.png')}}" alt="">
                </div>
                <div class="description">
                    <span class="nickname">{{'@'.$image->user->nick}}</span>
                    <span class="nickname date">{{' | ' . \FormatTime::LongTimeFilter($image->created_at)}}</span>
                    <p>{{$image->description}}</p>
                </div>
                <a href="" class="btn btn-comments">
                    Comments ({{count($image->comments)}})
                </a>
            </div>
            @endforeach
             <!-- PAGINATION-->
        <div class="clearfix"></div>
        {{$images->links()}}
        </div>
    </div>
</div>
@endsection
