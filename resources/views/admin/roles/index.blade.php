<x-app-layout>
  <x-slot name="header">
    <div class="flex mx-auto justify-items-stretch justify-between" role="group">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $title }}</h2>
      @can('create-role')
        <a href="{{ route('admin.roles.create') }}">
          <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Add New Role</button>
        </a>
      @endcan
    </div>
  </x-slot>

  <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Created</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
    
        <tbody>

          @foreach($roles as $role)
                <tr style="
                @if ($loop->even)
                    background-color:lightgray;
                @endif
                ">
                <td class="px-6 py-4">{{ $role->name }}</td>
                
                <td class="px-6 py-4">{{ $role->created_at }}</td>
                <td style="display:flex; align-items:center;">
                    <a href="{{ route('admin.roles.edit', $role->id) }}"><button>Edit</button></a>
                    <form method="POST" style="display:inline-block; margin:auto" action="{{ route('admin.roles.destroy', $role->id) }}">
                        @csrf  @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $roles->links() }}
  </div>
</x-app-layout>
