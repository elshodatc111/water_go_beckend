<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summernote Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-dark bg-light mb-4 rounded">
            <div class="container-fluid">
                <a class="navbar-brand  text-dark" href="{{ route('home') }}"><img src="./image/logo.png" style="width:64px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('all') }}">Barcha natijalar</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('createSubject') }}">Yangi malumot</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('Employees') }}">Operatorlar</a>
                            </li>
                            @endauth
                        @endif
                    </ul>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a :href="route('logout')" class="btn btn-outline-danger" onclick="event.preventDefault(); this.closest('form').submit();"> Chiqish </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-success">Kirish</a>
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </nav>

        <div class="mb-4">
            <form action="{{ route('show') }}" method="POST" class="d-flex mb-3">
                @csrf 
                <input type="text" name="title" placeholder="Qidiruv..." value={{ $searchTerm }} class="form-control" required>
            </form>
            @if($searchTerm)
                <p><b>Qidiruv matni: </b>{{ $searchTerm }}</p>
            @endif
            @forelse($results as $item)
            <div class="card shadow-sm rounded mb-2">
                <div class="card-body">
                    <div class="card-title">
                        <a href="{{ route('showUpdate',$item['id']) }}"><h5>{{ $item['title'] }}</h5></a>
                        <p>{{ substr($item['discription'], 0, 60) }}...</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="card shadow-sm rounded mb-2">
                <div class="card-body">
                    <div class="card-title">
                        <p>Nothing found</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Discription',
                tabsize: 2,
                height: 200
            });
        });
    </script>

</body>
</html>
