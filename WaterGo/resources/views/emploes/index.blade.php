@extends('layouts.layout')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
            <i class="fa fa-plus"></i> Yangi Hodim
        </button>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
<div class="card">
    <div class="card-header d-block d-md-flex py-3">
        <h5 class="mb-0">Hodimlar</h5>
        <p class="ms-auto mb-0">Barcha Hodimlar</p>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hodim</th>
                    <th>Telefon raqami</th>
                    <th>Email</th>
                    <th>Holati</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($User as $item)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['phone'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>
                        @if($item['user_status']=='true')
                            Aktiv
                        @else
                            Bloklangan
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('emploes_show',$item['id']) }}" class="btn btn-info p-1"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Yangi Hodim Qo'shish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addCustomerForm" action="{{ route('emploes_create',$Company->id ) }}" method="POST">
                @csrf 
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Hodimning FIO</label>
                        <input type="text" id="name" name="name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="phone">Hodimning Telefon Raqam</label>
                        <input type="text" id="phone" name="phone" value="+998" class="form-control phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Hodimning Email</label>
                        <input type="text" id="email" name="address" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="role">Hodimning Lavozimi</label>
                        <select name="role" class="form-select" style="border-radius: 0;height:50px">
                            <option value="">Tanlang</option>
                            <option value="drektor">Drektor</option>
                            <option value="despetcher">Dispetcher</option>
                            <option value="currer">Kurrer</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>    

@endsection
