<x-admin>
    <div>
    
    <x-slot name="header">
        <header>
        <h1>{{ $page }}</h1>
        </header>
    </x-slot>
       

        <dl>
            <dt>
                <dd>
                {{$brand->id}}
                </dd>
                <dd>
                {{$brand->name}}
                </dd>
                <dd>
                {{$brand->description}}
                </dd>
                <dd>
                {{$brand->created_at}}
                </dd>
                <dd>
                {{$brand->updated_at}}
                </dd>
            </dt>
        </dl>
        
        
    </div>
</x-admin>