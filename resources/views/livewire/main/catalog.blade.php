{{-- resources/views/livewire/main/catalog.blade.php --}}
<div class="w-full bg-white">
    <x-slot name="header">
        <div class="text-center w-full py-12 mb-6 bg-gray-100 border-b">
            <h1 class="text-xl md:text-4xl pb-4 text-gray-900">
                Welcome to Shopaholic
            </h1>
            <p class="text-gray-500 text-lg mt-1">Best Shop in the universe</p>        
        </div>
    </x-slot>

    <div class="grid grid-cols-4 gap-4 py-8 px-12 md:px-0">
        <div class="col-span-3 mb-12 px-6">
          
            @forelse ($products as $product)
              <article class="">
                <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
                    <div class="flex items-center col-span-4">
                        
                        <img src="{{ asset(Storage::url($product->cover)) }}" alt="{{ $product->name }}" class="object-cover h-48 w-96 rounded">
                    </div>
                    <div class="col-span-8">
                      <div class="flex items-center py-1 text-sm relative">
                        <div class="flex items-center justify-between w-full min-w-0 ">
                            <a href="#">
                            <h2 class="mr-auto text-lg cursor-pointer hover:text-gray-900 font-semibold">{{ \Illuminate\Support\Str::limit($product->name, 17, $end='...') }}
                            </h2>
                            </a>
                            <div class="mt-1 text-xl font-semibold">${{ $product->price }}</div>
                            <div class="mt-1">

                            <span class="text-red-800 cursor-pointer hover:text-red-500">
                             <livewire:main.star-button :key="'star-' . $product->id" :$product />
                            </span>
                        </div>
                            
                      </div>
                     

                      
                    </div>
                     <div class="mt-1 text-xl">{{ $product->description }}</div>
                    <div class="mt-4">
                        @if (\Cart::getContent()->where('id', $product->id)->count())
                            <a href="{{ route('shopping.cart') }}">
                            <button class="inline-flex items-center px-4 py-2 bg-red-700 hover:bg-blue-900 rounded-md">
                                <x-main.in-cart />
                                <span class="text-white">In Cart</span>
                                </button>
                            </a>
                        @else
                            <button wire:click="addToCart({{ $product->id }})" class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-900 rounded-md">
                                <x-main.add-to-cart />
                                <span class="text-white">Add to Cart</span>
                            </button>
                        @endif
                      </div>
                    
                </div>
                </article>
            @empty
                <h4 class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">No products yet.</h4>
            @endforelse

            @if ($this->paginator->hasMorePages())
                <div x-intersect="$wire.loadMore" class="h-12 -translate-y-44"></div>
            @endif

            @if ($this->paginator->hasMorePages())
                <button wire:click="loadMore">Load more</button>
            @endif
        </div>
            
      <!-- sidebar -->
        <div class="px-6">
            <aside class="rounded shadow overflow-hidden mb-6">
                <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Blog search</h3>
                <div class="flex flex-wrap justify-start gap-2 topics">
                    <div x-data="{
                            query: '{{ request('search', '') }}'
                        }" x-on:keyup.enter.window="$dispatch('search',{
                            search : query
                        })" id="search-box">
                        <div class="flex items-center px-3 py-2 mb-3 bg-gray-100 w-62 rounded-2xl">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                            <input x-model="query"
                                    class="w-40 ml-1 text-xs text-gray-800 bg-transparent border-none outline-none focus:outline-none focus:border-none focus:ring-0 placeholder:text-gray-400"
                                    type="text" placeholder="search blog">
                                    <a x-on:click="$dispatch('search',{search : query })" class="w-7 h-7 text-white bg-green-500 px-1 rounded-2xl">go</a>
                        </div>
                    </div>
                </div>
            </aside>
                    
            <aside class="rounded shadow overflow-hidden mb-6">
                <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Tags cloud</h3>
                    <div class="flex flex-wrap justify-start gap-2 topics">
                      
                    </div>
            </aside>
                    
            <aside class="rounded shadow overflow-hidden mb-6">
                <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Latest Posts</h3>

                <div class="p-4">
                    <ul class="list-reset leading-normal">
                        
                    </ul>
                </div>
            </aside>

        </div>
        <!-- /sidebar -->
    </div>

</div>
