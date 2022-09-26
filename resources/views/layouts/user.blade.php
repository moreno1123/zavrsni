<x-app-layout>
    <div class="relative flex flex-row space-x-3">
        <a href="{{ route('idea.index') }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">Sve ideje</span>
            <x-notification-success />
        </a>
        <a href="{{ route('idea.index').'?filter=Moje+ideje' }}" class="flex items-center font-semibold hover:underline">
            <span class="ml-2">Moje ideje</span>
        </a>
    </div>
    <div class="flex flex-col md:flex-row md:mt-4 md:ml-5 relative justify-around w-full">
        <div class="flex flex-col items-center">
            <div>
                <img src="{{ $user->avatar() }}" alt="avatar" class="w-32 h-32 rounded-md mt-6 mr-6">
            </div>
            @if ($user->isAdmin())
            <div class="mr-6 text-center uppercase text-blue text-xl font-bold mt-1">Admin</div>
            @endif
        </div>
        <div class="flex flex-col space-y-3">
            <div>
                <form action="{{ route('update_user') }}" method="POST" class="flex flex-col space-y-4 mb-4">
                    @csrf
                    <div class="flex flex-col items-center justify-between space-y-3">
                        <label for="name" class="w-full">
                            <div class="flex flex-row">
                                <span class="text-3xl font-semibold">Naziv</span>
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 mt-1 ml-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </div>
                        </label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full bg-gray-200 text-sm rounded-xl border-none px-6 py-3" />
                        <label for="about" class="w-full">
                            <div class="flex flex-row">
                                <span class="text-3xl font-semibold">Opis</span>
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 mt-1 ml-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </div>
                        </label>
                        <textarea cols="40" rows="5" name="about" class="w-full bg-gray-200 text-sm rounded-xl border-none px-6 py-3">{{ $user->about }}</textarea>
                        <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                            <span class="ml-1">Ažuriraj</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-col space-y-1">
                <span class="text-3xl font-semibold">Datum kreiranja</span>
                <span class="text-xl">{{ $user->created_at->format('d.m.Y H:i:s') }}</span>
            </div>
        </div>
        @if (session('success_message_user'))
        <div x-data="{ isVisible: true }" x-init="setTimeout(() => {isVisible = false}, 5000)" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" @keydown.escape.window="isOpen = false" class="absolute -top-4 right-0 text-green font-semibold text-base">
            {{ session('success_message_user') }}
        </div>
        @endif
        @if (session('success_message_category'))
        <div x-data="{ isVisible: true }" x-init="setTimeout(() => {isVisible = false}, 5000)" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" @keydown.escape.window="isOpen = false" class="absolute -top-4 right-0 text-green font-semibold text-base">
            {{ session('success_message_category') }}
        </div>
        @endif
        @if (session('error_message'))
        <div x-data="{ isVisible: true }" x-init="setTimeout(() => {isVisible = false}, 5000)" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" @keydown.escape.window="isOpen = false" class="absolute -top-4 right-0 text-red font-semibold text-base">
            {{ session('error_message') }}
        </div>
        @endif
    </div>
</x-app-layout>
@admin
<div class="w-full flex flex-col justify-center">
    <div class="bg-gray-200 p-2 rounded-xl mt-8 w-full flex justify-center">
        <table class="table rounded-xl w-full text-xxs md:text-sm">
            <caption class="text-left py-2 text-xl font-semibold ml-2">Spam ideje</caption>
            <tr class="text-left" id="col_one">
                <th id="row_one">Korisničko ime</th>
                <th id="row_two">Broj spamova</th>
                <th class="row_three" id="row_three">Naziv ideje</th>
                <th class="row_three text-center"></th>
                <th class="row_three text-center"></th>
                <th class="row_three text-center"></th>
            </tr>
            @foreach ($spam_ideas as $spam_idea)
            <tr class="">
                <td id="row_four">{{ $spam_idea->name }}</td>
                <td id="row_five">{{ $spam_idea->spam_reports }}</td>
                <td><a href="{{ route('idea.show', $spam_idea) }}" class="idea-link hover:underline">{{ $spam_idea->title }}</a></td>
                <td class="text-center" x-data><a href="#" @click.prevent="isOpen = false
                                                livewire.emit('temporary-ban', { user_id : {{ $spam_idea->user_id }} })
                                                " class="transition duration-150 ease-in px-1 py-2 underline bg-green-button text-white rounded block">
                        Tjedna zabrana
                    </a></td>
                <td id="row_six" class="text-center" x-data><a href="#" @click.prevent="isOpen = false
                                                livewire.emit('permanent-ban', { user_id : {{ $spam_idea->user_id }} })
                                                " class="transition duration-150 ease-in px-1 py-2 underline bg-red-button text-white rounded block">
                        Trajna zabrana
                    </a></td>
                @if(!empty($spam_idea->banned_at))
                <td id="row_six" class="text-center" x-data><a href="#" @click.prevent="isOpen = false
                                                livewire.emit('remove-ban', { user_id : {{ $spam_idea->user_id }} })
                                                " class="bg-blue hover:bg-blue-hover cursor-pointer transition duration-150 ease-in px-1 py-2 underline text-white rounded block">Ukloni zabranu</a></td>
                @else
                <td class="text-center">Nema zabrane</td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>

    <div class="flex justify-center">
        <div class="bg-gray-200 p-2 rounded-xl mt-8 flex flex-col md:flex-row w-full md:w-2/3 justify-center relative md:space-x-8">
            @if (session('success_message_category'))
            <div x-data="{ isVisible: true }" x-init="setTimeout(() => {isVisible = false}, 5000)" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" @keydown.escape.window="isOpen = false" class="absolute -top-8 left-1 text-green font-semibold text-base">
                {{ session('success_message_category') }}
            </div>
            @endif
            <table class="table rounded-xl text-xxs md:text-sm">
                <caption class="text-left py-2 text-xl font-semibold ml-2">Kategorije</caption>
                <tr class="text-left" id="col_one">
                    <th id="row_one">Ažuriraj naziv</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td id="row_four" class="flex flex-row">
                        <form action="{{ route('update_category') }}" method="POST" class="flex flex-row space-y-4 mb-4">
                            @csrf
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class=" bg-gray-200 text-xxs md:text-sm rounded-xl border-none px-6 py-3" />
                            <input type="hidden" name="categoryId" id="categoryId" value="{{ $category->id }}" />
                            <button type="submit" class="flex items-center justify-center ml-2 h-11 text-xxs md:text-sm bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-4 py-2 md:px-6 md:py-3">
                                <span class="ml-1">Ažuriraj</span>
                            </button>
                        </form>
                        <form action="{{ route('delete_category') }}" method="POST" class="flex flex-row space-y-4 mb-4 text-xxs md:text-sm">
                            @csrf
                            <input type="hidden" name="categoryId" id="categoryId" value="{{ $category->id }}" />
                            <button type="submit" class="flex items-center justify-center ml-2 h-11 text-xxs md:text-sm text-white font-semibold rounded-xl border bg-red-button transition duration-150 ease-in px-4 py-2 md:px-6 md:py-3">
                                <span class="ml-1">Izbriši</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="mr-2">
                <h1 class="text-left py-2 text-xl font-semibold ml-1">Kreiraj kategoriju</h1>
                <form action="{{ route('create_category') }}" method="POST" class="flex flex-col space-y-4 mb-4 rounded-xl bg-white p-2">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="Unesi naziv" class=" bg-gray-200 text-sm rounded-xl border-none px-6 py-3" required />
                    <button type="submit" class="flex items-center justify-center h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                        <span class="ml-1">Kreiraj</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<livewire:temporary-ban />
<livewire:permanent-ban />
@endadmin