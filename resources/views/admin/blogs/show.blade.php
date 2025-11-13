@extends('admin.layouts.app')

@section('title', 'View Blog Post')
@section('subtitle', 'Preview your blog article')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $blog->title }}</h1>
            <p class="mt-1 text-sm text-gray-600">Published by {{ $blog->author->name }} • {{ $blog->created_at->format('M j, Y \a\t g:i A') }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.blogs.edit', $blog) }}"
               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white text-sm font-medium rounded-lg hover:shadow-lg transform hover:scale-105 transition duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Post
            </a>
            <a href="{{ route('admin.blogs.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                ← Back to Blog Posts
            </a>
        </div>
    </div>

    <!-- Status Badge -->
    <div class="flex items-center space-x-4">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
            {{ $blog->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
            {{ ucfirst($blog->status) }}
        </span>
        @if($blog->status === 'published' && $blog->published_at)
            <span class="text-sm text-gray-600">
                Published on {{ $blog->published_at->format('M j, Y \a\t g:i A') }}
            </span>
        @endif
    </div>

    <!-- Featured Image -->
    @if($blog->featured_image)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                 class="w-full h-64 object-cover">
        </div>
    @endif

    <!-- Blog Content -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Content</h3>
        </div>
        <div class="p-6">
            @if($blog->excerpt)
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-red-500">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Excerpt:</h4>
                    <p class="text-gray-600 italic">{{ $blog->excerpt }}</p>
                </div>
            @endif

            <div class="prose prose-gray max-w-none">
                {!! $blog->content !!}
            </div>
        </div>
    </div>

    <!-- Categories & Tags -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Categories -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Categories</h3>
            </div>
            <div class="p-6">
                @if($blog->categories->count() > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach($blog->categories as $category)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No categories assigned</p>
                @endif
            </div>
        </div>

        <!-- Tags -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Tags</h3>
            </div>
            <div class="p-6">
                @if($blog->tags->count() > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach($blog->tags as $tag)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No tags assigned</p>
                @endif
            </div>
        </div>
    </div>

    <!-- SEO Information -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">SEO Information</h3>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">URL Slug</label>
                <div class="mt-1 flex items-center">
                    <span class="text-sm text-gray-500">/blog/</span>
                    <span class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">{{ $blog->slug }}</span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Reading Time</label>
                <span class="text-sm text-gray-600">{{ $blog->reading_time }} minutes</span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Word Count</label>
                <span class="text-sm text-gray-600">{{ str_word_count(strip_tags($blog->content)) }} words</span>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end space-x-4 pb-6">
        <a href="{{ route('admin.blogs.index') }}"
           class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Back to Blog Posts
        </a>
        <a href="{{ route('admin.blogs.edit', $blog) }}"
           class="px-6 py-2 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-medium rounded-md hover:shadow-lg transform hover:scale-105 transition duration-300">
            Edit This Post
        </a>
    </div>
</div>
@endsection
