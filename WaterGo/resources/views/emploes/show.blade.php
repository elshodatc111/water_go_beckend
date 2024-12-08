@extends('layouts.layout2')

@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
        <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
            <i class="fa fa-lock"></i> Hodim Parolini Yangilash
        </button>
        <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#faoliyat">
            <i class="fa fa-gears"></i> Hodim Ish Faoliyati
        </button>
        <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#updateuser">
            <i class="fa fa-pencil"></i> Hodim Ma'lumotlarini Yangilash
        </button>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-block d-md-flex py-3">
                    <h5 class="mb-0">Hodim Haqida</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hodim FIO</td>
                                <td style="text-align: right;"> Elshod Musurmonov</td>
                            </tr>
                            <tr>
                                <td>Hodim Telefon Raqami</td>
                                <td style="text-align: right;"> +998 90 888 8888</td>
                            </tr>
                            <tr>
                                <td>Hodim Lavozimi</td>
                                <td style="text-align: right;"> Kurrer</td>
                            </tr>
                            <tr>
                                <td>Hodim Email</td>
                                <td style="text-align: right;"> elshodatc1116@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Hodim Ish Faoliyati</td>
                                <td style="text-align: right;"> elshodatc1116@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Hodim Ishga Olindi</td>
                                <td style="text-align: right;"> elshodatc1116@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-block d-md-flex py-3">
                    <h5 class="mb-0">Hodim Aktiv Buyurtmalari</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Buyurtmachi</th>
                                <th>Buyurtmachi Manzil</th>
                                <th>Buyurtma soni</th>
                                <th>Qabul qildi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
            
    <div class="card mt-3">
        <div class="card-header d-block d-md-flex py-3">
            <h5 class="mb-0">Hodim buyurtmalari tarixi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Buyurtmachi</th>
                        <th>Buyurtmachi Manzil</th>
                        <th>Buyurtmachi Hududi</th>
                        <th>Buyurtma soni</th>
                        <th>Buyurtmachi Holati</th>
                        <th>Qabul qildi</th>
                        <th>Yakunlandi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="updateuser" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Hodim Ma'lumotlarini Yangilash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCustomerForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="customerName">Hodimning FIO</label>
                            <input type="text" id="customerName" name="name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="customerPhone">Hodimning Telefon Raqam</label>
                            <input type="text" id="customerPhone" name="phone" value="+998" class="form-control phone" required>
                        </div>
                        <div class="form-group">
                            <label for="customerAddress">Hodimning Email</label>
                            <input type="text" id="customerAddress" name="address" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="customerAddress">Hodimning Lavozimi</label>
                            <select name="" class="form-select" style="border-radius: 0;height:50px">
                                <option value="">Tanlang</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">O'zgarishlarni Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <div class="modal fade" id="faoliyat" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Hodim Ish Faoliyati</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCustomerForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="customerName">Faoliyat turi</label>
                            <select name="" id="" class="form-select p-3">
                                <option value="">Tanlang</option>
                                <option value="">Faoliyatini Qayta Aktivlashtirish</option>
                                <option value="">Faoliyatini Yakunlash</option>
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
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Yangi Buyurtmachi Qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCustomerForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="customerName">Yangi parol</label>
                            <input type="password" id="customerName" name="name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="customerName">Yangi parolni takrorlang</label>
                            <input type="password" id="customerName" name="name" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">Yangilash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    

@endsection
