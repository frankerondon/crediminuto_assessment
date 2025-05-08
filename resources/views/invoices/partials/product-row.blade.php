<div class="row mb-3">
    <div class="col-md-6">
        <select name="products[0][id]" class="form-select" required>
            <option value="">Seleccione un producto</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} - ${{ number_format($product->price, 2) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input type="number" name="products[0][quantity]" class="form-control" min="1" required>
    </div>
</div>