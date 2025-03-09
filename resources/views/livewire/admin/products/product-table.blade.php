<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
  <!-- Header -->
  <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
      <h3 class="text-lg font-bold text-slate-800">{{ $title }}</h3>
    <!-- Input -->
      <div class="w-full max-w-sm min-w-[200px] relative">
        <div class="relative">
          <input
            class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
            placeholder="Search for product..." wire:model.live.debounce.300ms="search"
            />
            <button class="absolute h-8 w-8 right-0 top-0 my-auto px-2 flex items-center rounded" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-slate-600">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </div>
      </div>
    <!-- End Input -->
    <div class="w-full max-w-sm min-w-[100px]">
    <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
      <label class="block mb-2 text-sm font-medium text-gray-900 w-full">Per Page:</label>
      <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.live="perPage">
          <option value="5">5</option>
          <option value="7">7</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
    </div>
    </div>
  </div>
  <!-- End Header -->
  <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
    
      <thead>
          <tr>
            <th class="p-4 border-b border-slate-300 bg-slate-50"  wire:click="setSortFunctionality('name')">
              <button class="flex items-center ml-1">
                Name
                @if ($sortByColumn != 'name')
                  <x-buttons.up-down />
                @elseif($sortDirection == 'ASC')
                  <x-buttons.up />
                @else
                   <x-buttons.down />
                @endif
              </button>
            </th>

            <th class="p-4 border-b border-slate-300 bg-slate-50" wire:click="setSortFunctionality('email')">
              <button class="flex items-center ml-1">
                Price
                @if ($sortByColumn != 'price')
                  <x-buttons.up-down />
                @elseif($sortDirection == 'ASC')
                  <x-buttons.up />
                @else
                   <x-buttons.down />
                @endif
              </button>
            </th>

            <th class="p-4 border-b border-slate-300 bg-slate-50" wire:click="setSortFunctionality('created_at')">
              <button class="flex items-center ml-1">
                Created at
                @if ($sortByColumn != 'created_at')
                  <x-buttons.up-down />
                @elseif($sortDirection == 'ASC')
                  <x-buttons.up />
                @else
                  <x-buttons.down />
                @endif
              </button>
            </th>
            <th class="p-4 border-b border-slate-300 bg-slate-50">
              <p class="block text-center text-md font-bold leading-none text-gray-800">
                Action
              </p>
            </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($products as $item)
          <tr class="hover:bg-slate-50 border-b border-slate-200">
            <td class="p-4 py-5 whitespace-nowrap text-sm font-medium text-gray-800">{{$item->name}}
            </td>
            <td class="p-4 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->price}}</td>
            <td class="p-4 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->created_at}}</td>
            <td class="p-4 py-4 whitespace-nowrap text-end text-sm font-medium">
              <div class="inline-flex rounded-md shadow-sm" role="group">
              <a href="{{ route('admin.products.edit', $item) }}">
                <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Edit</button></a>
              @can('delete', $item)
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" wire:click="deleteProduct({{ $item->id }})"  wire:confirm="Are you sure you want to delete this product?">Delete</button>
              @endcan
              </div>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
    {{ $products->links()}}
  </div>

</div>

