@extends('layouts.app_frontend')
@section('title', 'Checkout')
@section('content')
<div class="container">
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Payment details</h2>
        <div class="row">
            <div class="col-lg-8">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="firstName">Name</label>
                            <input name="t_name" required class="form-control form-control-lg" id="firstName" type="text" placeholder="Enter your first name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="lastName">Email address</label>
                            <input name="t_email" required class="form-control form-control-lg" id="lastName" type="text" placeholder="Enter your last name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="phone">Phone number</label>
                            <input name="t_phone" required class="form-control form-control-lg" id="phone" type="tel" placeholder="e.g. +02 245354745">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="address">Address line</label>
                            <input name="t_address" class="form-control form-control-lg" id="address" type="text" placeholder="House number and street name">
                        </div>
                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Payment</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Total of order</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong class="small font-weight-bold">Subtotal</strong>
                                <span class="text-muted small">{{ Cart::priceTotal(0) }}</span>
                            </li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong class="text-uppercase small font-weight-bold">Total</strong>
                                <span>{{ Cart::subtotal(0) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
