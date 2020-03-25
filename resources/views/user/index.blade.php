@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @foreach($users as $user)
        <div class="profile-user">
            @if($user->image)
                <div class="container-avatar">
                    <img src="{{ route('user.avatar', [ 'filename'=>$user->image])}}" class="avatar">
                </div>
            @endif
          <div class="user-info">
            <h2>{{'@' . $user->nick}}</h2>
            <h3>{{$user->name. ' ' .$user->surname}}</h3>
            <span class="nickname date">{{' Registered | ' . \FormatTime::LongTimeFilter($user->created_at)}}</span>
            <br>
            <a href="{{route('profile', ['id' => $user->id])}}" class="">See profile</a>
          </div>
        </div>
        <div class="clearfix"></div>
        @endforeach
             <!-- PAGINATION-->
        <div class="clearfix"></div>
        {{$users->links()}}
        </div>
    </div>
</div>
@endsection
