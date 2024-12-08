@extends('layouts.layout2')

@section('content')
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                    <i class="fa fa-plus"></i> Balansin To'ldirish
                </button>
                <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#addUser">
                    <i class="fa fa-user"></i> Yangi Hodim Qo'shish
                </button>
                <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#addSmsPaket">
                    <i class="fa fa-user"></i> Yangi SMS Paketi
                </button>
                <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#smsMatn">
                    <i class="fa fa-envelope-o"></i> SMS matni
                </button>
            </nav>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success') }}</div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-block d-md-flex py-3">
                        <h5 class="mb-0">Kompaniya haqida</h5>
                    </div>
                    <div class="card-body">
                        <form id="addCustomerForm" action="{{ route('company_update_one',$Company->id ) }}" method="POST">
                            @csrf 
                            @method('put')
                            <div class="modal-body">
                                <label for="company_name">Kompaniya nomi</label>
                                <input type="text" id="company_name" name="company_name" value="{{ $Company->company_name }}" class="form-control" required placeholder="Kompaniya nomi"/>
                                <label for="drektor" class="mt-1">Kompaniya Drektori</label>
                                <input type="text" id="drektor" name="drektor" class="form-control" required placeholder="Kompaniya Drektori"  value="{{ $Company->drektor }}"/>
                                <label for="phone" class="mt-1">Kompaniya Telefon Raqami</label>
                                <input type="text" id="phone" name="phone" class="form-control phone"  value="{{ $Company->phone }}" required placeholder="Telefon raqam"/>
                                <label for="addres" class="mt-1">Kompaniya Manzili</label>
                                <input type="text" id="addres" name="addres" class="form-control"  value="{{ $Company->addres }}" required placeholder="Manzil"/>
                                <button type="submit" class="btn btn-primary mt-2">O'zgarishlarni saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-block d-md-flex py-3">
                        <h5 class="mb-0">Kompaniya sozlamalari</h5>
                    </div>
                    <div class="card-body">
                        <form id="addCustomerForm" action="{{ route('company_update_two',$Company->id ) }}" method="POST">
                            @csrf 
                            @method('put')
                            <div class="modal-body">
                                <label for="customerAddress" class="my-1 ">Kompaniya Balansi</label>
                                <input type="number" id="customerAddress" name="address" class="form-control"  value="{{ $Company->balans }}" disabled required placeholder="Balansi"/>
                                <label for="paymart" class="mt-1">Kompaniya Yetqazilgan Xizmat Uchun To'lov</label>
                                <input type="number" id="paymart" value="{{ $Company->paymart }}" name="paymart" class="form-control" required placeholder="Tarif To'lovi"/>
                                <label for="company_status" class="mt-1">Kompaniya holati (Aktiv/Block)</label>
                                <select class="form-control p-3" name="company_status" required>
                                    <option value="">Tanlang</option>
                                    <option value="true">Active</option>
                                    <option value="false">Block</option>
                                </select>
                                <label for="message_status" class="mt-1">Kompaniya Sms Xizmatlari (Aktiv/Block)</label>
                                <select class="form-control p-3" name="message_status" required>
                                    <option value="">Tanlang</option>
                                    <option value="true">Active</option>
                                    <option value="false">Block</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">O'zgarishlarni saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-block d-md-flex py-3">
                        <h5 class="mb-0">Kompaniya Statistikasiss</h5>
                    </div>
                    <div class="card-body pt-5">
                        <table class="table table-bordered text-center my-2" style="font-size: 16px;">
                        <thead>
                            <tr>
                                <th>Hodisa Nomi</th>
                                <td>Hodisa Soni</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left;">Mavjud SMS Paketi Soni</td>
                                <td>{{ $countSms }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Kompaniya Balansi</td>
                                <td>{{ number_format($Company->balans, 2, '.', ' ') }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Kompanya Tulov Tarifi</td>
                                <td>{{ number_format($Company->paymart, 2, '.', ' ') }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Kompaniya Holati</td>
                                <td>
                                    @if($Company->company_status=='true')
                                        Aktiv
                                    @else
                                        Block
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Kompaniya Sms Sozlamalari</td>
                                <td>
                                    @if($Company->message_status=='true')
                                        Aktiv
                                    @else
                                        Block
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Barcha Qabul Qilingan Buyurtmalar</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Aktiv buyurtmalar</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Yetqazilayotgan buyurtmalar</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">Yetqazilgan buyurtmalar</td>
                                <td>5</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
        <div class="row ">
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-block d-md-flex">
                        <h5 class="mb-0">Kompaniya Barcha Hodimlari</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FIO</th>
                                    <th>Lavozim</th>
                                    <th>O'chirish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($User as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['role'] }}</td>
                                    <td class="text-center">
                                        <form id="addCustomerForm" action="{{ route('company_user_delete',$item->id ) }}" method="POST">
                                            @csrf 
                                            @method('put')
                                            <button type="submit" class="btn btn-danger p-1 m-0"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan=4 class='text-center'>Hodimlar mavjud emas.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Kompaniya Barcha To'lovlari</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>To'lov summasi</th>
                        <th>To'lov haqida</th>
                        <th>To'lov vaqti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($CompanyBalans as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ number_format($item->summa, 2, '.', ' ') }} so'm</td>
                            <td>{{ $item->about }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=4 class="text-center">To'lovlar mavjud emas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Kompaniya SMS Paketlari Tarixi</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>SMS paket soni</th>
                        <th>Paket haqida</th>
                        <th>Paket olingan vaqt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($CompanyPaket as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->count }}</td>
                            <td>{{ $item->about }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan=4 class="text-center">Xarid qilingan SMS paketlari mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="smsMatn" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModalLabel">Buyurtma qabul qilinganda yuboriladigan sms matni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addCustomerForm" action="{{ route('company_sms_text_update',$Company->id ) }}" method="POST">
                        @csrf 
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="text">SMS matni</label>
                                <textarea name="text" required class="form-control">{{ $message }}</textarea>
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
        <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModalLabel">Kompaniya Balansiga To'lov Qo'shish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addCustomerForm" action="{{ route('company_paymart_create',$Company->id ) }}" method="POST">
                        @csrf 
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="summa">Kompaniya Balansini To'ldirish Summasi</label>
                                <input type="number" id="summa" name="summa" class="form-control" required placeholder="Summa"/>
                            </div>
                            <div class="form-group">
                                <label for="about">Balansini To'ldirish Haqida</label>
                                <textarea name="about" required class="form-control"></textarea>
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
        <div class="modal fade" id="addSmsPaket" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Yangi SMS Paket Qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCustomerForm" action="{{ route('company_paket_create',$Company->id ) }}" method="POST">
                    @csrf 
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="count">SMS Paket Soni</label>
                            <input type="number" id="count" name="count" class="form-control" required placeholder="SMS Paket Soni"/>
                        </div>
                        <div class="form-group">
                            <label for="about">SMS Paket Haqida</label>
                            <input type="text" id="about" name="about" class="form-control" required placeholder="SMS Paket Haqida"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">Paketni Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
        </div>  
        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModalLabel">Yangi Hodim Qo'shish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addCustomerForm" action="{{ route('company_user_create',$Company->id ) }}" method="POST">
                        @csrf 
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Hodimning FIO</label>
                                <input type="text" id="name" name="name" class="form-control" required placeholder="FIO"/>
                            </div>
                            <div class="form-group">
                                <label for="phone">Hodimning Telefon raqami</label>
                                <input type="text" id="phone" name="phone" value="+998" class="form-control phone" required placeholder="Phone"/>
                            </div>
                            <div class="form-group">
                                <label for="role">Hodim Lavozimi</label>
                                <select name="role" required class="form-control p-3" style="">
                                    <option value="">Tanlang</option>
                                    <option value="drektor">Drektor</option>
                                    <option value="despetcher">Dispetcher</option>
                                    <option value="currer">Kurrer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Hodimning Email Adresi</label>
                                <input type="email" id="email" name="email" class="form-control" required placeholder="Email"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                            <button type="submit" class="btn btn-primary">Hodimni Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
@endsection
