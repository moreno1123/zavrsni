<div x-cloak x-data="{
        isOpen: false,
        messageToDisplay: '',
        showNotification(message) {
            this.isOpen = true
            this.messageToDisplay = message
            setTimeout(() => {
                this.isOpen = false
            }, 5000)
        }
    }" x-init="
            Livewire.on('ideaWasUpdated', message => {
                showNotification(message)
            })

            Livewire.on('ideaWasMarkedAsSpam', message => {
                showNotification(message)
            })

            Livewire.on('ideaWasMarkedAsNotSpam', message => {
                showNotification(message)
            })

            Livewire.on('commentWasAdded', message => {
                showNotification(message)
            })

            Livewire.on('commentWasUpdated', message => {
                showNotification(message)
            })

            Livewire.on('commentWasDeleted', message => {
                showNotification(message)
            })

            Livewire.on('commentWasMarkedAsSpam', message => {   
                showNotification(message)
            })

            Livewire.on('commentWasMarkedAsNotSpam', message => {
                showNotification(message)
            })

            Livewire.on('userWasBannedPermanetly', message => {
                showNotification(message)
            })

            Livewire.on('userIsAlreadyBannedPermanetly', message => {
                showNotification(message)
            })

            Livewire.on('userWasBannedTemporary', message => {
                showNotification(message)
            })

            Livewire.on('userIsAlreadyBannedTemporary', message => {
                showNotification(message)
            })

            Livewire.on('userRemoveBan', message => {
                showNotification(message)
            })
    " x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" @keydown.escape.window="isOpen = false" class="absolute right-0">
    <div class="flex items-center">
        <div class="font-semibold text-green text-sm sm:text-base" x-text="messageToDisplay"></div>
    </div>
</div>