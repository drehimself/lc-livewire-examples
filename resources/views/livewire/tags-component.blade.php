<div
    class="w-1/2 border px-4 py-2"
    wire:ignore
    x-data
    x-init="
        new Taggle($el, {
            tags: {{ $tags }},
            onTagAdd: function(e, tag) {
                Livewire.emit('tagAdded', tag)
            },
            onTagRemove: function(e, tag) {
                Livewire.emit('tagRemoved', tag)
            }
        })

        Livewire.on('tagAddedFromBackend', tag => {
            {{-- alert('A tag was added: ' + tag); --}}
        })
">

</div>
