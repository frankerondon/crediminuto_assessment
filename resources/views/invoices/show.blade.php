@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Factura #{{ $invoice->id }}</h2>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Volver a Facturas</a>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>Cliente</h5>
                <p>{{ $invoice->customer->name }}</p>
            </div>
            <div class="col-md-6">
                <h5>Vendedor</h5>
                <p>{{ $invoice->seller->name }}</p>
            </div>
        </div>

        <h5>Productos</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>${{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total:</th>
                    <th>${{ number_format($invoice->total, 2) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection