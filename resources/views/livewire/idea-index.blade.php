<div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-200 ease-in cursor-pointer" x-data @click="const target = $event.target.tagName.toLowerCase(); if(target !== 'button' && target !== 'path' && target !== 'a' && target !== 'img' && target !== 'svg'){$event.target.closest('.idea-container').querySelector('.idea-link').click()}">
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue @endif">{{ $votes }}</div>
            <div class="text-gray-500">Votes</div>
        </div>
        <div class="mt-8">
            @if($hasVoted)
            <button class="w-20 text-white bg-blue hover:bg-blue-hover border border-blue font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:border-gray-400 transition duration-200 ease-in">Voted</button>
            @else
            <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border-gray-200 border hover:border-gray-400 transition duration-200 ease-in">Vote</button>
            @endif
        </div>
    </div>
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <div class="flex-none mx-2 md:mx-0">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="mx-2 md:mx-4 w-full flex flex-col justify-between">
            <h4 class="text-xl font-semibold mt-2 md:mt-0">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea -> title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea -> description }}
            </div>
            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                    <div>{{ $idea -> created_at -> diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>

                <div class="flex items-center space-x-2 mt-4 md:mt-0" x-data="{ open: false }">
                    <div class=" bg-gray-200 text-xxs fomt-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                    <button class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in px-3 relative" @click="open = true">
                        <svg fill="currentColor" width="24" height="6">
                            <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5);">
                        </svg>
                        <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0" x-show="open" x-transition.origion.top.left @click.away="open=false" @keydown.escape.window="open=false" style="display:none;">
                            <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Mark as spam</a></li>
                            <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition d uration-200 ease-in block">Delete post</a></li>
                        </ul>
                    </button>
                </div>

                <div class="flex items-center md:hidden mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none @if($hasVoted) text-blue @endif">{{ $votes }}</div>
                        <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                    </div>
                    @if($hasVoted)
                    <button class="w-20 text-xxs uppercase text-white bg-blue hover:bg-blue-hover border border-blue font-bold rounded-xl hover:border-gray-400 transition duration-200 ease-in px-4 py-3 -mx-5">
                        voted
                    </button>
                    @else
                    <button class="w-20 text-xxs uppercase bg-gray-200 border border-gray-200 font-bold rounded-xl hover:border-gray-400 transition duration-200 ease-in px-4 py-3 -mx-5">
                        vote
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> <!-- kraj ideje  -->