@extends('layouts.admin')

@section('title', 'Create News')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Create News</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="question_text">Link</label>
            <textarea name="link" id="link" rows="4"
                class="form-control @error('link') is-invalid @enderror">{{ old('link') }}</textarea>
            @error('question_text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="question_text">Judul</label>
            <textarea name="judul" id="judul" rows="4"
                class="form-control @error('judul') is-invalid @enderror">{{ old('judul') }}</textarea>
            @error('question_text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="question_text">Deskripsi</label>
            <textarea name="desc" id="desc" rows="4"
                class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
            @error('question_text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Tambahkan Media</label>
            <input type="file" name="media" class="form-control">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md">Create</button>
            <a href="{{ route('news.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md">Cancel</a>
        </div>
    </form>
</div>
@endsection

<!-- Letakkan semua script di bagian scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin">
</script>
<script>
    // Konfigurasi TinyMCE
    tinymce.init({
        selector: '#desc',
        plugins: 'advlist lists link image code',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    // Validasi form
    document.querySelector('form').addEventListener('submit', function (e) {
        const editor = tinymce.get('desc');
        const textarea = document.getElementById('desc');

        // Pastikan konten tersinkronisasi
        textarea.value = editor.getContent();

        // Validasi manual
        if (editor.getContent().trim() === '') {
            e.preventDefault();
            alert('Kolom soal tidak boleh kosong');
            editor.focus();
        }
    });

</script>