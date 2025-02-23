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

  <div class="py-12">
    <form wire:submit="save" class="max-w-sm mx-auto">

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Post title</label>
                <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Post title" required  wire:model="form.title" />
                <div>
                    @error('form.title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Post content</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="text content..."  wire:model="form.content"></textarea>

                <div>
                    @error('form.content') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            
            <div class="mb-3">
                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.blur="form.tags" multiple>
                <option selected>Choose some tags</option>
                @foreach ($tags as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
            </div>

            <fieldset>
                <legend class="sr-only">Status</legend>

                <div class="flex items-center justify-between mb-4">
                    @foreach ($postStatus as $status)
                        <input type="radio" wire:model="form.status" value="{{$status->value}}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" id="status"> 
                        <label for="status" class="block ms-2  text-sm font-medium text-gray-900">
                        {{ $status->name }}
                        </label>
                        
                    @endforeach
                </div>
            </fieldset>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </form>
    </div>

</div>