<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                                <a class="nav-link text-dark" href="{{ route('createSubject') }}">Yangi ma'lumot</a>
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
            @elseif (Session::has('success1'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{Session::get('success1') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3>Operatorlar</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>FIO</th>
                    <th>Email</th>
                    <th>Create Data</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($User as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                        <form action="{{ route('EmployeesDelete', $item['id']) }}" method="post">
                            @csrf 
                            @method('delete')
                            <button class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <h3>Yangi Operatorlar</h3>
        <form action="{{ route('EmployeesStory') }}" method="post">
            @csrf 
            <Label>FIO</Label>
            <Input type="text" name="name" required class="form-control mb-2"/>
            <Label>Email</Label>
            <Input type="email" name="email" required class="form-control mb-2"/>
            <Label>Password</Label>
            <Input type="password" name="password" required class="form-control mb-2"/>
            <button type="submit" class="btn btn-primary w-100">Saqlash</button>
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
