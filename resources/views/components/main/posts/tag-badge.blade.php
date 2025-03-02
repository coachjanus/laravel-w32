{{-- resources/views/components/main/posts/tag-badge.blade.php --}}
@props(['tag'])
<a wire:navigate href="{{ route('blog', ['tag' => $tag->slug]) }}" class="text-white bg-red-600 rounded-xl px-3 py-1 text-base">{{ $tag->name }}</a>
