<table id="table" class="rounded-xl w-full text-xxs md:text-lg">
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