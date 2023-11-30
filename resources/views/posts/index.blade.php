<x-app>

    <section class="section">
        <div class="text-end">
          <span class="fw-bold">Partager une expérience</span>
          <button class="btn" data-bs-toggle="modal" data-bs-target="#post">
            <img src="{{ asset('assets/img/plus.png') }}" alt="">
          </button>        
        </div>
  
        <div class="row">
            
            @forelse ($posts as $post)

            <div class="col-xxl-6">
    
                <div class="card pt-2">
                <div class="card-body pb-0">
                    <a class="d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" width="50" alt="Profil" class="rounded-circle" style="margin-right: 15px;" _mstalt="94315" _msthash="32">
                        <div class="ml-4">
                            <span class="d-block ps-s2" >{{ $post->user->name }}</span>
                            <span class="d-block text-muted" >{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        
                    </a>
                    <p class="py-2 mb-0">
                        {{ $post->content }}
                    </p>
                    
                    <div class="text-primary text-muted d-flex align-items-center">
                    <img src="{{ asset('assets/img/likes.png') }}" class="img-fluid" alt="Like button">
                    <span class="mx-1">{{ $post->likes()->count() }} personnes aiment ceci</span>
                    </div>
                    <div class=" d-flex border-top py-2 fw-bold">
                    <div class="d-nline">
                        <img src="{{ asset('assets/img/like.png') }}" class="img-fluid" alt="Like button"> Like
                    </div>
                    <div class="d-nline px-3">
                        <a href="{{ route('posts.show',$post) }}">
                            <img src="{{ asset('assets/img/chat.png') }}" class="img-fluid" alt="Comment button">
                            Comment
                        </a>
                    </div>
                </div>  
                            
                </div>
    
                </div>
    
            </div>

            @empty
                <div class="alert alert-info" role="alert">
                    No post found
                </div>
            @endforelse

  
        </div>
        {{ $posts->links() }}
      </section>

</x-app>