@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }
    footer {
      background-color: #ececec;
      padding: 10px 0;
      text-align: center;
      font-size: 14px;
      color: #555;
      border-top: 1px solid #ddd;
    }
    footer a {
      color: #007bff;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }
  </style>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('home') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Wikipedia_wordmark.svg/500px-Wikipedia_wordmark.svg.png" alt="Wikipedia">
            </a>
        </div>
        <form action="{{ route('search') }}" method="post" class="text-center row">
            @csrf 
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="input-group search-input mt-3">
                    <input type="text" name="search" class="form-control" placeholder="Search Wikipedia...">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
    <h4 class="w-100 text-center">Yangi Post joylash</h4>
    <form action="{{ route('post_creates') }}" method="post">
      @csrf 
        <label for="title" class="my-2" style="font-weight:500">Post nomi</label>
        <input type="text" name="title" class="form-control" required>
        <label for="discriotion" class="my-2" style="font-weight:500">Post haqida ma'lumot</label>
        <textarea id="summernote" name="discriotion"></textarea>
        <button class="btn btn-primary w-100 mt-2" type="submit">Saqlash</button>
    </form>
  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
        // Initialize Summernote
        $('#summernote').summernote({
            placeholder: 'Post haqida malumotlarni kiriting...',
            tabsize: 2,
            height: 300,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        });
    </script>
@endsection