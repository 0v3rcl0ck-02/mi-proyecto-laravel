<div class="card-shadow">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Consultar productos</h3>
        </div>
        <form action="{{ route('products.index') }}" method="GET">
            <select class="form-control" name="product_id" id="product_id">    
            <option value="1">seleccionar todo los productos</option>
            <option value="2">producto mayor a 100$</option>
            <option value="3">producto menor a 500$</option>
            <option value="4">producto con precio de 7$</option>
            <option value="5">producto que inicie con la letra m</option>
            <option value="6">productos que terminen con la letra o</option>
            <option value="7">productos que contengan la letra ar</option>
            </select>
            <div class="text-center">
                <button class="btn btn-primary my-3 " type="submit">Consultar</button>
            </div>
        </form>
    </div>
</div>