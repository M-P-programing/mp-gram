<div class="card pub_image">
    <div class="card-header">
        @if($image->user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', [ 'filename'=>$image->user->image])}}" class="avatar">
            </div>
        @endif
        <div class="data-user">
        <a href="{{route('profile', ['id' => $image->user->id])}}">
            {{$image->user->name. ' '.$image->user->surname}}
            <span class="nickname"> {{' | @' . $image->user->nick}}</span>
        </a>
        </div>
    </div>
    <div class="card-body">
        <div class="image-container">
        <a href="{{route('image.detail', ['id' => $image->id])}}">
            <img src="{{ route('image.file', ['filename' => $image->image_path])}}" alt="">
        </a>
        </div>
    </div>
    @include('includes.likes')
    <div class="description">
        <span class="nickname">{{'@'.$image->user->nick}}</span>
        <span class="nickname date">{{' | ' . \FormatTime::LongTimeFilter($image->created_at)}}</span>
        <p>{{$image->description}}</p>
    </div>
    <a href="{{route('image.detail', ['id' => $image->id])}}" class="btn btn-comments">
        Comments ({{count($image->comments)}})
    </a>
</div>
