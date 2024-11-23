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
    </div>
    <hr>
    @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
    <div class="row">
      <div class="col-6">
        <div class="card mb-3">
          <div class="card-header">Profil</div>
          <div class="card-body">
            <p><b>FIO: </b>{{ auth()->user()->name }}</p>
            <p><b>Email: </b>{{ auth()->user()->email }}</p>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card mb-3">
          <div class="card-header">Parolni yangilash</div>
          <div class="card-body">
            <form action="{{ route('update_password') }}" method="POST">
              @csrf
              <label for="">Joriy parol</label>
              <input type="password" name="current_password" required class="form-control">
              <label for="">Yangi parol</label>
              <input type="password" name="new_password" required class="form-control">
              <label for="">Yangi parolni takrorlang</label>
              <input type="password" name="new_password_confirmation" required class="form-control">
              <button type="submit" class="btn btn-primary w-100 mt-2">Parolni yangilash</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection