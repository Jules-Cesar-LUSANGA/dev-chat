<x-app>


    <div class="card pt-2">
        <div class="card-body pb-0">
            <span class="d-flex align-items-center pt-1 pe-0">
                <img src="{{ asset('assets/img/profile-img.jpg') }}" width="50" alt="Profil" class="rounded-circle" style="margin-right: 15px;" _mstalt="94315" _msthash="32">
                <div class="ml-4">
                    <span class="d-block ps-s2 text-primary" >{{ $post->user->name }}</span>
                    <span class="d-block text-muted" >{{ $post->created_at->diffForHumans() }}</span>
                </div>
                
            </span>
            <p class="py-2 mb-0">
                {{ $post->content }}
            </p>
            
            <div class="text-primary text-muted d-flex align-items-center">
            <img src="{{ asset('assets/img/likes.png') }}" class="img-fluid" alt="Like button">
            <span class="mx-1">{{ $post->likes()->count() }} personnes aiment ce partage</span>

            @if ($post->is_liked() == null)
                <form action="{{ route('like.set', ['post_type' => 'post', 'post_id' => $post->id]) }}" method="get">
                    @csrf
                    <input type="submit" value="J'aime" class="btn btn-link text-decoration-none">
                </form>                
            @else
                <form action="{{ route('like.unset', ['post_type' => 'post', 'post_id' => $post->id]) }}" method="get">
                    @csrf
                    <input type="submit" value="Je n'aime plus" class="btn btn-link text-decoration-none">
                </form>    
            @endif

            </div>    
    </div>
</div>

    <div class="mt-2">
        
        @foreach ($post->comments as $comment)
        
        <div class="card my-2">
            <div class="card-body pb-0">
                <span class="d-flex align-items-center pt-1">
                    <img src="{{ asset('assets/img/profile-img.jpg') }}" width="50" alt="Profil" class="rounded-circle" style="margin-right: 15px;" _mstalt="94315" _msthash="32">
                    <div class="ml-4">
                        <span class="d-block ps-s2 text-primary" >{{ $comment->user->name }}</span>
                        <span class="d-block text-muted" >{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
        
                </span>
              <p class="py-2 mb-0">
                  {{ $comment->content }}
              </p>
              <p>
                <img src="{{ asset('assets/img/likes.png') }}" class="img-fluid" alt="Like button">
                <span>{{ $comment->likes()->count() }}  </span>
                @if ($comment->is_liked() == null)
                    <a href="{{ route('like.set', ['post_type' => 'comment', 'post_id' => $comment->id]) }}">J'aime </a>
                @else
                    <a href="{{ route('like.unset', ['post_type' => 'comment', 'post_id' => $comment->id]) }}">Je n'aime plus</a>
                @endif
                   <a href="#" class="mx-2">Répondre</a>
              </p>
            </div>
        </div>
        @endforeach
        
    </div>
      <form action="" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control r" name="content" id="content" cols="10" rows="3" placeholder="Votre commentaire"></textarea>
            <input type="submit" value="Commenter" class="btn btn-primary my-2">
        </div>
      </form>


</x-app>