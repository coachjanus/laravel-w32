<x-app-layout>
   <x-slot name="header">
   <div class="flex mx-auto justify-items-strech justify-between">
        <h2>Create Category</h2>
        <div>
            <a href="{{ route('admin.categories.index')}}">
            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">All categories</button>
            </a>
        </div>
    </div>
   </x-slot>

   <div class="container mx-auto">
        <form action="{{ route('admin.categories.store')}}" method="post">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category name</label>
                <input type="text" 
                id="large-input" 
                name="name" 

                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name')is-invalid @enderror">
                @error('name')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ $message }}</span>
                </div>
                @enderror
            </div>
            
            <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category status</label>
            </div>
         
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create new category</button>

        </form>
   </div>
</x-app-layout>




