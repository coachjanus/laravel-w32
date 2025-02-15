<x-app-layout>
   <x-slot name="header">
    Categories list
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
                        <a href="{{route('categories.edit', $category->id)}}">Edit</a> <form method="post" style="display:inline-block; margin:auto" action="{{route('categories.destroy', $category->id)}}">
                        @csrf @method('delete')
                        <button type="submit">Delete</button>
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
