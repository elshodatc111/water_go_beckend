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
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (Session::has('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('createStory') }}" method="post">
            @csrf 
            <h3>Yangi ma'lumot kiritish</h3>
            <label for="title">Title</label>
            <input type="text" placeholder="Title" name="title" class="form-control" required>
            <label for="discription" class="mt-2">Discription</label>
            <textarea id="summernote" name="discription" required></textarea>
            <button class="btn btn-primary w-100 mt-2" typw="submit">Saqlash</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Discription',
                tabsize: 2,
                height: 400
            });
        });
    </script>

</body>
</html>
