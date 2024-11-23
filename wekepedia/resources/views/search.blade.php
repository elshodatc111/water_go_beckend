@extends('layouts.app')

@section('content')
<style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 100vh;
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
      margin: 0;
    }
    a {
      color: black;
      text-decoration: none;
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

<div class="container text-center">
    <div class="top">
        
        <br>
        <div class="row">
            <div class="col-12">
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
    </div>
    <div class="container mt-4">
        <div class="content-header">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" >Qidruv: {{ $key }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" >Qidruvda: {{ $count }} ta ma'lumot topildi</a>
                </li>
            </ul>
        </div>
        <div class="container-body px-2 m-0 p-0" style="text-align:left">
            <ul class="m-0 py-2" style="list-style:none">
            @forelse($PostArray as $item)
                <li class="p-0 m-0 pb-3">
                    <a href="{{ route('post_show',$item['id']) }}"><h5 class="p-0 m-0">{{ $item['title'] }}</h5></a>
                    <p class="p-0 m-0">{{ $item['discriotion'] }}</p>
                    <hr>
                </li>
            @empty
                <li class="p-0 m-0 pb-3 text-center">
                    <p class="p-0 m-0">Qidruv bo'yicha xech narsa topilmadi</p>
                </li>
            @endforelse
            </ul>
        </div>
    </div>


@endsection