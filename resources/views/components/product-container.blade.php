<div class="col-3">
   <div class="card shadow h-100">
      <div class="w-100" style="height: 300px">
         <img src="{{ asset($product->image) }}" class="w-100 h-100" style="background-size: 100% 100%" alt="">
      </div>
      <div class="card-body d-flex justify-content-end flex-column">
         <h5 class="card-title w-100 text-truncate">{{ $product->name }}</h5>
         <h6 class="card-text"> Rp {{ number_format($product->price, 0, ',', '.') }} </h6>
         <a href="{{ route('detail', ['id' => $product->id]) }}" class="btn btn-primary">More Detail</a>
      </div>
   </div>
</div>
