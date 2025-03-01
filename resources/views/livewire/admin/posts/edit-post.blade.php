<div>

  <x-slot name="header">
    <div class="flex mx-auto justify-items-stretch justify-between" role="group">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
        <a href="{{ route('admin.posts.index') }}">
        <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">All posts</button>
        </a>
    </div>
  </x-slot>

  <div class="container mx-auto">
    <div class="grid grid-cols-1 px-5 gap-8 lg:pr-20">
        <x-mary-form wire:submit="save">
            <x-mary-input label="Post title" wire:model="form.title" />
            <x-mary-textarea label="Post content" wire:model="form.content" rpws="5" />
            <x-mary-file label="Upload Post Cover" wire:model="form.cover" accept="image/pngm image/jpeg" />

            @if ($form->cover)
                <img src="{{ $form->cover->temporaryUrl() }}" class="object-cover h-48">
            @endif
            @if ($form->oldCover)
                <img src="{{ asset(Storage::url($form->oldCover)) }}" class="object-cover h-48">
            @endif

            <x-mary-choices-offline label="Tags" wire:model="form.tags" :options="$allTags" multiple searchable icon="o-home" />

            <x-mary-radio label="Status" wire:model="form.status" :options="$postStatus" option-value="value" option-label="name" class="radio mx-10 px-14" />

            <x-slot:actions>
                <x-mary-button label="Cancel" />
                <x-mary-button label="Update" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>

        </x-mary-form>
    </div>
  </div>
</div>