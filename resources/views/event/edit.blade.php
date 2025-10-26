@extends('layouts.admin')

@section('title', 'Edit News')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Edit News</h1>

    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $event->judul) }}" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="desc" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea name="desc" id="desc" rows="10" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('desc') border-red-500 @enderror">{{ old('desc', $event->desc) }}</textarea>
            @error('desc')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Media</label>
            
            @if($event->media)
                <div class="mb-2">
                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="max-w-xs h-auto rounded">
                    <p class="text-sm text-gray-500 mt-1">Current image (upload new to replace)</p>
                </div>
            @endif
            
            <input type="file" name="media" id="media" accept="image/*" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('media') border-red-500 @enderror">
            @error('media')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div id="mediaPreview" class="mt-2"></div>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md">Update</button>
            <a href="{{ route('news.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md">Cancel</a>
        </div>
    </form>
</div>
@endsection