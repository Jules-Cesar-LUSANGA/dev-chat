<x-app>
    <div>
        @forelse ($notifications as $notification)


            <div class="alert alert-info fade show" role="alert">
                <i class="bi bi-info-circle me-1"></i>
            <strong>{{ $notification->type->name }}</strong>
            
            <p>
                {{ $notification->type->message }}
                @if ($notification->type->id == 1)
                    <a href="{{ route('posts.show', $notification->post_id) }}">Lien</a>
                @endif                  
            </p>
              
            </div>

        @empty
    
        @endforelse
    </div>
</x-app>
