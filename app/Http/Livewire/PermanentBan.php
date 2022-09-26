<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PermanentBan extends Component
{
    public User $user;

    protected $listeners = ['permanent-ban' => 'permanentBan'];

    public function permanentBan($user_id)
    {
        $ban = $user_id['user_id'];
        $user = User::findOrFail($ban);

        $user->ban();

        if (empty($user->banned_at)) {
            return redirect('/user')->with('success_message_user', 'Korisniku ' . $user->name . ' je uspješno dodijeljena trajna zabrana.');
        } else {
            $this->emit('userIsAlreadyBannedPermanetly', 'Korisnik ' . $user->name . ' već ima zabranu.');
        }
    }

    public function render()
    {
        return view('livewire.permanent-ban');
    }
}
