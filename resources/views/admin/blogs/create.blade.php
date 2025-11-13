@extends('admin.layouts.app')

@section('title', 'Create Blog Post')
@section('subtitle', 'Write a new blog article')

@push('styles')
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .tox .tox-editor-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .category-tag {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        margin: 0.25rem;
        background: linear-gradient(135deg, #dc2626 0%, #ea580c 100%);
        color: white;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .category-tag.selected {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
    }

    .tag-chip {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.5rem;
        margin: 0.125rem;
        background: #f3f4f6;
        color: #374151;
        border-radius: 0.25rem;
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .tag-chip:hover {
        background: #e5e7eb;
    }

    .tag-chip.selected {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
    }
</style>
@endpush

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create New Blog Post</h1>
            <p class="mt-1 text-sm text-gray-600">Share your thoughts and insights with your audience</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}"
           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            ← Back to Blog Posts
        </a>
    </div>

    <!-- Create Form -->
    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Basic Information -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>
                <p class="mt-1 text-sm text-gray-600">Essential details for your blog post</p>
            </div>
            <div class="p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                           placeholder="Enter an engaging title for your post" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">URL Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                           placeholder="url-friendly-version-of-your-title">
                    <p class="mt-1 text-sm text-gray-500">Leave blank to auto-generate from title</p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                              placeholder="Brief summary of your post (optional)">{{ old('excerpt') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">A short summary that appears in previews and search results</p>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Content</h3>
                <p class="mt-1 text-sm text-gray-600">Write your blog post content</p>
            </div>
            <div class="p-6">
                <textarea name="content" id="content" class="w-full">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Media -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Featured Image</h3>
                <p class="mt-1 text-sm text-gray-600">Upload an eye-catching image for your post</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700">Image File</label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                        <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div id="image-preview" class="hidden">
                        <img id="preview-img" src="" alt="Preview" class="max-w-sm rounded-lg shadow-md">
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories & Tags -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Categories -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Categories</h3>
                    <p class="mt-1 text-sm text-gray-600">Select relevant categories</p>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @foreach($categories as $category)
                            <label class="flex items-center">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                       {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                                       class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                                <span class="ml-3 text-sm text-gray-700">{{ $category->name }}</span>
                            </label>
                        @endforeach
                        @if($categories->isEmpty())
                            <p class="text-sm text-gray-500">No categories available. <a href="#" class="text-red-600 hover:text-red-800">Create one first</a></p>
                        @endif
                    </div>
                    @error('categories')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tags -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Tags</h3>
                    <p class="mt-1 text-sm text-gray-600">Add relevant tags</p>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @foreach($tags as $tag)
                            <label class="flex items-center">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                       {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                       class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                                <span class="ml-3 text-sm text-gray-700">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                        @if($tags->isEmpty())
                            <p class="text-sm text-gray-500">No tags available. <a href="#" class="text-red-600 hover:text-red-800">Create some first</a></p>
                        @endif
                    </div>
                    @error('tags')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Publishing Options -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Publishing Options</h3>
                <p class="mt-1 text-sm text-gray-600">Control when and how your post is published</p>
            </div>
            <div class="p-6 space-y-6">
                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-2 space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="draft"
                                   {{ old('status', 'draft') === 'draft' ? 'checked' : '' }}
                                   class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                            <span class="ml-3 text-sm text-gray-700">Draft - Save as draft for later editing</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="published"
                                   {{ old('status') === 'published' ? 'checked' : '' }}
                                   class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                            <span class="ml-3 text-sm text-gray-700">Published - Make post live immediately</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Publish Date -->
                <div id="publish-date-section" class="{{ old('status') === 'published' ? '' : 'hidden' }}">
                    <label for="published_at" class="block text-sm font-medium text-gray-700">Publish Date & Time</label>
                    <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                    <p class="mt-1 text-sm text-gray-500">Leave blank to publish immediately</p>
                    @error('published_at')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Actions -->
        <div class="flex items-center justify-end space-x-4 pb-6">
            <a href="{{ route('admin.blogs.index') }}"
               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-medium rounded-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                Create Blog Post
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^\w\s-]/g, '') // Remove special characters
        .replace(/\s+/g, '-') // Replace spaces with hyphens
        .replace(/-+/g, '-') // Replace multiple hyphens with single
        .trim('-'); // Trim hyphens from start/end

    if (!document.getElementById('slug').value) {
        document.getElementById('slug').value = slug;
    }
});

// Show/hide publish date based on status
document.querySelectorAll('input[name="status"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const publishSection = document.getElementById('publish-date-section');
        if (this.value === 'published') {
            publishSection.classList.remove('hidden');
        } else {
            publishSection.classList.add('hidden');
        }
    });
});

// Image preview
document.getElementById('featured_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
});

// Initialize TinyMCE
tinymce.init({
    selector: '#content',
    height: 500,
    menubar: false,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Inter,Helvetica,Arial,sans-serif; font-size:14px }',
    skin: 'oxide',
    content_css: false
});
</script>
@endpush
