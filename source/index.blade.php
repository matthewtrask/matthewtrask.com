@extends('_layouts.main')

@section('body')
    @foreach ($posts->where('featured', true) as $featuredPost)
        <div class="w-full mb-6">
            @if ($featuredPost->cover_image)
                <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
            @endif

            <p class="text-gray-700 font-medium my-2">
                {{ $featuredPost->getDate()->format('F j, Y') }}
            </p>

            <h2 class="text-3xl mt-0">
                <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="text-gray-900 font-extrabold">
                    {{ $featuredPost->title }}
                </a>
            </h2>

            <p class="text-gray-700 font-medium my-2">
                <b>{{ $featuredPost->getReadTime() }} {{ $featuredPost->getReadTime() > 1 ? 'minutes' : 'minute' }} read.</b>
            </p>


            <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

            <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="uppercase tracking-wide mb-4">
                Read
            </a>
        </div>

        <hr class="w-full border-b mt-2 mb-6">
    @endforeach

    @include('_components.newsletter-signup')

    @foreach ($posts->where('featured', false)->take(6)->chunk(2) as $row)
        <div class="flex flex-col md:-mx-6">
            @foreach ($row as $post)
                <div class="w-full md:mx-6">
                    @include('_components.post-preview-inline')
                </div>
            @endforeach
        </div>

{{--        @if (! $loop->last)--}}
{{--            <hr class="w-full border-b mt-2 mb-6">--}}
{{--        @endif--}}
    @endforeach
@stop
