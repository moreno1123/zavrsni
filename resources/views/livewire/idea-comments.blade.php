<div>
    @if ($comments->isNotEmpty())

    <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">

        @foreach ($comments as $comment)
        <livewire:idea-comment :key="$comment->id" :comment="$comment" :ideaUserId="$idea->user->id" />
        @endforeach
    </div>

    <div class="my-8 md:ml-22">
        {{ $comments->onEachSide(1)->links() }}
    </div>
    @else
    <div class="text-gray-400 text-center font-bold mt-16">Nema komentara...</div>
    @endif
</div>