 <div class="card shadow">
     <div class="card-header text-center">
         <h3>Formulario</h3>
     </div>
     <div class="card-body">
         <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
             @if (isset($product))
             @method("PUT")
             @endif
             @csrf
             <div class="mb-3">
                 <label for="name" class="form-label">Nombre</label>
                 <input value="{{ isset($product) ? $product->name :'' }}" type="text" name="name" id="name" class="form-control">
             </div>
             <div class="mb-3">
                 <label for="description" class="form-label">Descripción</label>
                 <input value="{{ isset($product) ? $product->description :'' }}" type="text" name="description" id="description" class="form-control">
             </div>
             <div class="mb-3">
                 <label for="price"
                     class="form-label">Precio</label>
                 <input value="{{ isset($product) ? $product->price :'' }}" type="number" name="price"
                     id="price" class="form-control" step="0.01" min="0">
             </div>
             <div class="mb-3 text-center">
                 @if (isset($product))

                 <button type="submit" class="btn btn-dark">Actualizar</button>
                 <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
                 @else
                 <button type="submit" class="btn btn-dark">Guardar</button>
                 @endif
             </div>

     </div>
 </div>