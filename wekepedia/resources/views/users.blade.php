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
    <div class="card mb-3">
      <div class="card-header">Barcha hodimlar</div>
      <div class="card-body">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>#</th>
              <th>FIO</th>
              <th>Email</th>
              <th>Ro'yhatga olindi</th>
              <th>O'chirish</th>
            </tr>
          </thead>
          <tbody>
            @forelse($User as $item)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $item['name'] }}</td>
              <td>{{ $item['email'] }}</td>
              <td>{{ $item['created_at'] }}</td>
              <td>
                <form action="{{ route('user_delete',$item['id']) }}" method="post">
                  @csrf 
                  @method('delete')
                  <button class="btn btn-danger py-0">o'chirsh</button>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td colspan=5 class="text-center">Hodimlar mavjud emas</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Yangi hodim qo'shish</div>
      <div class="card-body">
        <form action="{{ route('user_create') }}" method="post">
          @csrf 
          <label for="name" class="my-2">Hodim FIO</label>
          <input type="text" name="name" required class="form-control">
          <label for="email" class="my-2">Hodim Email</label>
          <input type="email" name="email" required class="form-control">
          <button class="btn btn-primary w-100 mt-2" type="submit">Hodimni saqlash</button>
        </form>
      </div>
    </div>
        
  </div>
@endsection