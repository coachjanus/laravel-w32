<div class="w-full bg-white">
    {{-- resources/views/livewire/main/post-show.blade.php --}}
    <x-slot name="header">
        <div class="text-center w-full py-12 mb-6 bg-gray-100 border-b">
            <h1 class="text-xl md:text-4xl pb-4 text-gray-900">
                Welcome to Blog News
            </h1>
            <p class="text-gray-500 text-lg mt-1">Best Blog in the universe</p>        
        </div>
    </x-slot>
    
    <div class="grid grid-cols-4 gap-4 py-8 px-12 md:px-0">
      <article class="col-span-3 mb-12 px-6">
        <img class="mx-auto w-full h-40 object-cover my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center py-5">
                <x-main.posts.author :author="$post->user" size="md" />
                <span class="text-sm text-gray-500">| {{ $post->getReadingTime() }} min read</span>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                    stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div
            class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
            <div class="flex items-center">
                <livewire:main.like-button :key="'like-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $post->content !!}
        </div>

        <div class="flex items-center mt-10 space-x-4">
            @foreach ($post->tags as $tag)
                <x-main.posts.tag-badge :tag="$tag" />
            @endforeach
        </div>

        <livewire:main.post-comments :key="'comments' . $post->id" :$post />
    </article>

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
						@foreach ( $resentPosts as $item)
							<li><a href="#" class="text-gray-darkest text-sm">{{$item->title}}</a></li>
						@endforeach 
					</ul>
				</div>
			</aside>

		</div>
  </div>
</div>
