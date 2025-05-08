@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Nueva Factura</h2>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div class="card-body">
        <form id="invoiceForm" action="{{ route('invoices.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Cliente</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">Seleccione un cliente</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Vendedor</label>
                    <select name="seller_id" class="form-select" required>
                        <option value="">Seleccione un vendedor</option>
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Producto</label>
                    <select id="product_id" class="form-select">
                        <option value="">Seleccione un producto</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} - ${{ number_format($product->price, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cantidad</label>
                    <input type="number" id="quantity" class="form-control" min="1" value="1">
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <button type="button" class="btn btn-secondary form-control" id="addProduct">
                        Agregar Producto
                    </button>
                </div>
            </div>

            <div class="table-responsive mb-3">
                <table class="table" id="productsTable">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><span id="totalAmount">$0.00</span></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary" id="submitInvoice">Crear Factura</button>
            </div>

            <div id="selectedProducts"></div>
        </form>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let products = [];
    let total = 0;

    document.getElementById('addProduct').addEventListener('click', function() {
        const productSelect = document.getElementById('product_id');
        const quantity = document.getElementById('quantity');
        const option = productSelect.options[productSelect.selectedIndex];
        
        if (!productSelect.value || quantity.value < 1) {
            alert('Por favor seleccione un producto y una cantidad válida');
            return;
        }

        const product = {
            id: productSelect.value,
            name: option.text,
            quantity: parseInt(quantity.value),
            price: parseFloat(option.dataset.price),
            subtotal: parseFloat(option.dataset.price) * parseInt(quantity.value)
        };

        // Agregar producto a la lista
        products.push(product);
        
        // Actualizar tabla
        updateProductsTable();
        
        // Limpiar campos
        productSelect.value = '';
        quantity.value = '1';
    });

    function updateProductsTable() {
        const tbody = document.querySelector('#productsTable tbody');
        tbody.innerHTML = '';
        total = 0;

        products.forEach((product, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${product.name}</td>
                <td>${product.quantity}</td>
                <td>$${product.price.toFixed(2)}</td>
                <td>$${product.subtotal.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeProduct(${index})">
                        Eliminar
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
            total += product.subtotal;
        });

        document.getElementById('totalAmount').textContent = `$${total.toFixed(2)}`;
        updateHiddenFields();
    }

    // Hacemos removeProduct global para que funcione el onclick
    window.removeProduct = function(index) {
        products.splice(index, 1);
        updateProductsTable();
    };

    function updateHiddenFields() {
        const container = document.getElementById('selectedProducts');
        container.innerHTML = '';
        
        products.forEach((product, index) => {
            container.innerHTML += `
                <input type="hidden" name="products[${index}][id]" value="${product.id}">
                <input type="hidden" name="products[${index}][quantity]" value="${product.quantity}">
            `;
        });
    }

    document.getElementById('invoiceForm').addEventListener('submit', function(e) {
        if (products.length === 0) {
            e.preventDefault();
            alert('Debe agregar al menos un producto a la factura');
        }
    });
});
</script>
@endpush
@endsection