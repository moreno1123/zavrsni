<x-app-layout>
    <x-slot name="title">
        {{ $idea->title }} | Voting
    </x-slot>
    <div class="relative">
        <a href="{{ url()->previous() }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">Sve ideje</span>
            <x-notification-success />
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    @can('update', $idea)
    <livewire:edit-idea :idea="$idea" />
    @endcan

    @can('delete', $idea)
    <livewire:delete-idea :idea="$idea" />
    @endcan

    @auth
    <livewire:mark-idea-as-spam :idea="$idea" />
    @endauth

    @admin
    <livewire:mark-idea-as-not-spam :idea="$idea" />
    @endadmin

    <livewire:idea-comments :idea="$idea" />

    @auth
    <livewire:edit-comment />
    @endauth

    @auth
    <livewire:delete-comment />
    @endauth

    @auth
    <livewire:mark-comment-as-spam />
    @endauth

    @admin
    <livewire:mark-comment-as-not-spam />
    @endadmin
</x-app-layout>