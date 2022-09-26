<div>
    @auth
    <form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
        @csrf
        <div>
            <input wire:model.defer="title" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Tvoja ideja" required>
            @error('title')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <select wire:model.defer="category" name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
        <div>
            <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Opis ideje" required></textarea>
            @error('description')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="text" wire:model="filetitle" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Naziv slike">
        </div>
        <div class="flex flex-col items-center justify-between space-y-3">
            <input type="file" wire:model.defer="filename" id="file">
            <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                <span class="ml-1">Unesi</span>
            </button>
        </div>
    </form>
    @else
    <div class="my-6 text-center">
        <a href="{{ route('login') }}" class="inline-block justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
            Prijava
        </a>
        <a href="{{ route('register') }}" class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4">
            Registracija
        </a>
    </div>
    @endauth
</div>