<div class="likes">
  <!-- CHECK IF USER LIKED THE IMAGE-->
  <?php $user_like = false;?>
  @foreach($image->likes as $likes)
  @if($likes->user->id == Auth::user()->id)
      <?php $user_like = true;?>
  @endif
  @endforeach

  @if($user_like)
      <img src="{{asset('images/heart-red.png')}}" alt="" data-id="{{$image->id}}" class="btn-like">
  @else
      <img src="{{asset('images/heart-grey.png')}}" alt="" data-id="{{$image->id}}" class="btn-dislike">
  @endif

  {{count($image->likes)}}
</div>