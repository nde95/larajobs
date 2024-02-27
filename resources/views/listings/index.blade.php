<x-layout>
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless(count($listings) == 0)
@foreach($listings as $listing)
 <x-listing-card :listing="$listing" />
@endforeach


@else
    <p>No results found</p>
@endunless
</div>

<div class="mx-4 my-4">
    {{ $listings->links() }}
</div>
</x-layout>
