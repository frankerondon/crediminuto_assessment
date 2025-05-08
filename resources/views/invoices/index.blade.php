@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Facturas</h2>
            <div>
                <a href="{{ route('invoices.create') }}" class="btn btn-primary">Nueva Factura</a>
                <a href="{{ url('/') }}" class="btn btn-secondary">Volver</a>
            </div>
            
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->customer->name }}</td>
                        <td>{{ $invoice->seller->name }}</td>
                        <td>${{ number_format($invoice->total, 2) }}</td>
                        <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">Ver Detalles</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection