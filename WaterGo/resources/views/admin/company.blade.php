@extends('layouts.layout')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
            <i class="fa fa-plus"></i> Yangi buyurtmachi
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
            <h5 class="mb-0">Kompaniyalar</h5>
            <p class="ms-auto mb-0">Barcha Kompaniyalar</p>
        </div>
        <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>#</th>
                <th>Kompaniya</th>
                <th>Drektor</th>
                <th>Balans</th>
                <th>To'lov summasi</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @forelse($Company as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->drektor }}</td>
                        <td>{{ number_format($item->balans, 2, '.', ' ') }}</td>
                        <td>{{ number_format($item->paymart, 2, '.', ' ') }}</td>
                        <td>
                            @if($item->company_status=='true')
                                Active
                            @else
                                Block 
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('company_show',$item->id) }}" class="btn btn-primary p-1"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan=7 class="text-center">Kompaniyalar mavjud emas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Yangi Buyurtmachi Qo'shish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('company_crate') }}" method="POST" id="addCustomerForm">
                @csrf 
                <div class="modal-body">
                <div class="form-group">
                    <label for="company_name">Kompaniya nomi</label>
                    <input type="text" id="company_name" name="company_name" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="drektor">Drektor</label>
                    <input type="text" id="drektor" name="drektor" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="phone">Drektor telefon raqami</label>
                    <input type="text" id="phone" name="phone" value="+998" class="form-control phone" required />
                </div>
                <div class="form-group">
                    <label for="addres">Kompaniya manzili</label>
                    <input type="text" id="addres" name="addres" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="paymart">Kompaniya tarif rejasi</label>
                    <input type="number" id="paymart" name="paymart" class="form-control" required />
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary">Qo'shish</button>
                </div>
            </form>
            </div>
        </div>
    </div>    
@endsection
