<div>
    <x-slot name="header">
        <div class="flex mx-auto justify-items-stretch justify-between" role="group">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
        <a href="{{ route('admin.products') }}">
        <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">All posts</button>
        </a>
        </div>
    </x-slot>

    <div class="py-12">
        <form wire:submit="save" class="max-w-sm mx-auto">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product name</label>
                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product name" required  wire:model="form.name" />
                <div>
                    @error('form.name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Product price</label>
                <input id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product price" required  type="number" wire:model="form.price" />
                <div>
                    @error('form.price') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            </div>

            <div class="mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Product description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="text description..."  wire:model="form.description"></textarea>

                <div>
                    @error('form.description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="mb-5">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select Category:</label>

                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.blur="form.category_id">
                <option selected>Choose a Category</option>
                @foreach ($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Select Brand:</label>

                <select id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.blur="form.brand_id">
                <option selected>Choose a Brand</option>
                @foreach ($brands as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
            </div>
            </div>

            <div class="mb-3">

                <div class="flex items-center justify-center w-full mt-4">

                    <label for="dropzone-file" class="flex items-center justify-between w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                        <div class="flex-col flex-1 items-center pt-5 pb-6">
                            @if ($form->cover)
                                <img src="{{ $form->cover->temporaryUrl() }}" class="object-cover h-48 w-96">
                            @endif
                        </div>
                        <div class="flex-col flex-1 items-center  pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> image</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>

                        <input id="dropzone-file" type="file" class="hidden"   wire:model="form.cover" />
                    </label>

                </div>
            </div>

            <fieldset>
                <legend class="sr-only">Status</legend>

                <div class="flex items-center justify-between mb-4">
                    @foreach ($productStatus as $status)
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