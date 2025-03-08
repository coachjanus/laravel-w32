<div class="w-full bg-white">
    {{-- resources/views/livewire/main/blog-page.blade.php --}}
    <x-slot name="header">
        <div class="text-center w-full py-12 mb-6 bg-gray-100 border-b">
            <h1 class="text-xl md:text-4xl pb-4 text-gray-900">
                Welcome to Blog News
            </h1>
            <p class="text-gray-500 text-lg mt-1">Best Blog in the universe</p>        
        </div>
    </x-slot>

   	<div class="flex items-center justify-between border-b border-gray-200 px-12">
		<div class="text-gray-600">
			@if ($this->activeTag || $search)
				<button class="mr-3 text-xs gray-500" wire:click="clearFilters()">X</button>
			@endif
			@if ($this->activeTag)
				<x-main.posts.badge wire:navigate href="{{ route('blog', ['tag' => $this->activeTag->slug]) }}"
					:textColor="$this->activeTag->text_color" :bgColor="$this->activeTag->bg_color">
						{{ $this->activeTag->name }}
				</x-main.posts.badge>
			@endif
			@if ($search)
				<span class="ml-2"> Blog containing : <strong>{{ $search }}</strong> </span>
			@endif
		</div>
		<div class="flex items-center space-x-4 font-light ">
			<x-checkbox wire:model.live="popular" />  <x-label> Popular </x-label>
			<button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4" wire:click="setSort('desc')"> Latest</button>
			<button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 " wire:click="setSort('asc')"> Oldest</button>
		</div>
	</div>
	
    <div class="grid grid-cols-4 gap-4 py-8 px-12 md:px-0">
        <div class="col-span-3 mb-12 px-6">
            @foreach ($posts as $post)
                <x-main.posts.post-item wire:key="{{ $post->id }}" :post="$post" />
            @endforeach
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
						@foreach ($tags as $tag)
							<x-main.posts.tag-badge :tag="$tag" />
						@endforeach
					</div>
			</aside>
					
			<aside class="rounded shadow overflow-hidden mb-6">
				<h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Latest Posts</h3>

				<div class="p-4">
					<ul class="list-reset leading-normal">
						@foreach ( $latestPosts as $item)
							<li><a href="#" class="text-gray-darkest text-sm">{{$item->title}}</a></li>
						@endforeach 
					</ul>
				</div>
			</aside>

		</div>
		<!-- /sidebar -->
    </div>
</div>
