<div>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Sve kategorije">Sve kategorije</option>
                @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model="filter" name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Bez filtera">Bez filtera</option>
                <option value="Najvise glasova">Najviše glasova</option>
                <option value="Najstarije ideje">Najstarije ideje</option>
                <option value="Galerija">Galerija</option>
                <option value="Moje ideje">Moje ideje</option>
                @admin
                <option value="Spam ideje">Spam ideje</option>
                <option value="Spam komentari">Spam komentari</option>
                @endadmin
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input wire:model="search" type="search" placeholder="Pretraži" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->

    <div class="ideas-container space-y-6 my-8">
        @forelse ($ideas as $idea)
        @if ($this->filter === 'Galerija')
        <livewire:galery-index :key="$idea->id" :idea="$idea" />
        @else
        <livewire:idea-index :key="$idea->id" :idea="$idea" :votesCount="$idea->votes_count" />
        @endif
        @empty
        <div class="mx-auto w-70 mt-12">
            <div class="text-gray-400 text-center font-bold mt-6">Nije pronađena niti jedna ideja...</div>
        </div>
        @endforelse
    </div> <!-- end ideas-container -->

    <div class="my-8">
        {{ $ideas->links() }}
    </div>
</div>