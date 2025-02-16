<x-app-layout>
   <x-slot name="header">
    <div class="flex mx-auto justify-items-strech justify-between">
        <h2>Trashed Categories</h2>
        <div>
            <a href="{{ route('admin.categories.index')}}">
            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">All categories</button>
            </a>
        </div>
    </div>
    
   </x-slot>

   <div class="container mx-auto">
   <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        Category name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category status
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              
              
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        {{ $category->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->status ? 'active' : 'not active' }}
                    </td>
                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                        {{ $category->created_at }}
                    </td>
                    <td class="px-6 py-4">
                    <form method="post" style="display:inline-block; margin:auto" action="{{route('admin.categories.restore', $category->id)}}">
                        @csrf
                        <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Restore</button>
                        </form>
                        <form method="post" style="display:inline-block; margin:auto" action="{{route('admin.categories.force', $category->id)}}">
                        @csrf @method('delete')
                        <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">Force Delete</button>
                        </form>
                    </td>
                </tr>
              @endforeach  
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
   </div>



</x-app-layout>
