<x-admin>
    <div>
        {{-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius --}}
        {!!}
       <x-slot name="header">
            <header>
            <h1>{{ $page }}</h1>
            </header>
        </x-slot>

        @{{name}}
        
        @verbatim
        {{}}
        {{}}
        @endverbatim

        @if ($brands)
        <table>
        <thead>
        <tr>
        <th>#</th>
        <th>Name</th>
        <th>Created</th>
        <th>Action</th>
        </tr>
        
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td>{{$brand->created_at}}</td>
            <td>
            <a href="/admin/brands/{{$brand->id}}"><button>Show</button></a>
            <button>Edit</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else 
            <p>No brands yet</p>
        @endif
        
      
    </div>
</x-admin>