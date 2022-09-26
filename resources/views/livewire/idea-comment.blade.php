<div class="comment-container relative bg-white rounded-xl flex transition duration-500 ease-in mt-4">
    <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $comment->user->avatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
            @if ($comment->user->isAdmin())
            <div class="md:text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
            @endif
        </div>
        <div class="w-full md:mx-4">
            <div class="text-gray-600">
                @admin
                @if ($comment->spam_reports > 0)
                <div class="text-red mb-2">Spam Reports: {{ $comment->spam_reports }}</div>
                @endif
                @endadmin

                <div class="mt-4 md:mt-0">
                    {{ $comment->body }}
                </div>

                @if (!empty($comment->fileName) && $comment->fileName != 'no-photo')
                <div class="mt-4">
                    <img src="{{ url('storage/images/'.$comment->fileName) }}" alt="slika" />
                </div>
                @endif
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
                    <div>&bull;</div>
                    <div>{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                @auth
                <div class="text-gray-900 flex items-center space-x-2" x-data="{ isOpen: false }">
                    <div class="relative">
                        <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3" @click="isOpen = !isOpen">
                            <svg fill="currentColor" width="24" height="6">
                                <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                            </svg>
                        </button>
                        <ul class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0" x-cloak x-show.transition.origin.top.left="isOpen" @click.away="isOpen = false" @keydown.escape.window="isOpen = false">
                            @can('update', $comment)
                            <li>
                                <a href="#" @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setEditComment', {{ $comment->id }})
                                    " class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">
                                    Ažuriraj komentar
                                </a>
                            </li>
                            @endcan

                            @can('delete', $comment)
                            <li>
                                <a href="#" @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setDeleteComment', {{ $comment->id }})
                                    " class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">
                                    Izbriši komentar
                                </a>
                            </li>
                            @endcan

                            <li>
                                <a href="#" @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setMarkAsSpamComment', {{ $comment->id }})
                                    " class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">
                                    Obilježi kao spam
                                </a>
                            </li>

                            @admin
                            @if ($comment->spam_reports > 0)
                            <li>
                                <a href="#" @click.prevent="
                                            isOpen = false
                                            Livewire.emit('setMarkAsNotSpamComment', {{ $comment->id }})
                                        " class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">
                                    Nije spam
                                </a>
                            </li>
                            @endif
                            @endadmin
                        </ul>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>