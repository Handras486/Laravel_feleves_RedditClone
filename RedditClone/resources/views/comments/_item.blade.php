<div class="comment">
    <div class="card mb-3" id="comment-{{ $comment->id }}">
        <div class="card-body">
            <div class="mb-2 d-flex">
                <form action="{{ route('comment.vote', $comment) }}" method="POST">
                    @csrf
                    <input type="submit" name="type" value="True" />    
                </form>
                <a>{{ $comment->score}}</a>
                <form action="{{ route('comment.vote', $comment) }}" method="POST">
                    @csrf
                    <input type="submit" name="type" value="False" />     
                </form>
                |
                <!-- kicsit béna, de nem találtam jobb megoldást -->
                @if ($comment->message != "<message deleted>")
                    <a class="user-toggle" href="#">
                        <img class="rounded-circle" src="{{ $comment->user->avatar }}" width="20" alt="{{ $comment->user->name }}" />
                        {{ $comment->user->name }}
                    </a>
                    |  
                @endif
                {{ $comment->created_at->diffForHumans() }}
                <a class="ms-auto edit-toggle" href="#" onclick="toggleEditFormVisbility(arguments[0])">
                    Edit
                </a>
                <form action="{{ route('comment.delete', $comment) }}" method="POST">
                    @csrf
                    <input type="submit" value="delete">
                </form>
                <a class="ms-auto reply-toggle" href="#" onclick="toggleReplyFormVisbility(arguments[0])">
                    Reply
                </a>

            </div>
            {{ $comment->message }}
        </div>
    </div>
    <div class="editform ms-5">
        <form  action="{{ route('comment.edit', $comment) }}" class="mb-3" method="POST">
            @csrf
            <input type="hidden" value="{{ URL::current() }}#comment-{{ $comment->id }}" name="redirect_url">
            <div class="mb-3">
                <textarea name="message" class="form-control"></textarea>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg mb-3">
                    {{ __('Edit') }}
                </button>
                <button class="btn btn-link" onclick="toggleReplyFormVisbility(arguments[0])">
                    {{ __('Cancel')}}
                </button>
            </div>
        </form>
    </div>
    <div class="replyform ms-5">
        <form  action="{{ route('comment.reply', $comment) }}" class="mb-3" method="POST">
            @csrf
            <input type="hidden" value="{{ URL::current() }}#comment-{{ $comment->id }}" name="redirect_url">
            <div class="mb-3">
                <textarea name="message" class="form-control"></textarea>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg mb-3">
                    {{ __('Reply') }}
                </button>
                <button class="btn btn-link" onclick="toggleReplyFormVisbility(arguments[0])">
                    {{ __('Cancel')}}
                </button>
            </div>
        </form>
    </div>
    <div class="replies ms-5">
        @foreach($comment->replies as $reply)
        @include('comments._item', ['comment' => $reply])
    </div>

@endforeach
</div>