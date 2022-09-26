<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TemporaryBan extends Component
{
    public User $user;

    protected $listeners = ['temporary-ban' => 'temporaryBan', 'remove-ban' => 'removeBan'];

    public function temporaryBan($user_id)
    {
        $ban = $user_id['user_id'];
        $user = User::findOrFail($ban);

        $user->ban([
            'expired_at' => '+1 week',
        ]);

        if (empty($user->banned_at)) {
            return redirect('/user')->with('success_message_user', 'Korisniku ' . $user->name . ' je uspješno dodijeljena tjedna zabrana.');
        } else {
            $this->emit('userIsAlreadyBannedTemporary', 'Korisnik ' . $user->name . ' već ima zabranu.');
        }
    }

    public function removeBan($user_id)
    {
        $ban = $user_id['user_id'];
        $user = User::findOrFail($ban);

        $user->unban();

        return redirect('/user')->with('success_message_user', 'Korisniku ' . $user->name . ' je uspješno uklonjena zabrana.');
    }

    public function render()
    {
        return view('livewire.temporary-ban');
    }
}
