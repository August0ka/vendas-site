@extends('site.layouts.app')

@section('site_content')
<div class="container my-4">
  <div class="row">
    <div class="col-md-6">
      <div class="ecommerce-gallery" data-mdb-ecommerce-gallery-init data-mdb-zoom-effect="true" data-mdb-auto-height="true">
        <div class="row py-3 shadow-5 bg-white rounded-start justify-content-center">
          <div class="col-12 mb-1">
            <div class="lightbox mb-2" data-mdb-lightbox-init style="width: 100%; height: 400px; overflow: hidden; position: relative;">
                <img src="{{ asset('storage/images/' . $product->main_image) }}" alt="Gallery image 1" class="ecommerce-gallery-main-img active w-100 img-fluid rounded" style="height: 100%; object-fit: contain; position: absolute;"/>
            </div>
            </div>
              @foreach($productImages as $productImage)
                <div class="col-3 mt-1 miniature border rounded me-2" style="height: 100px; width: 100px;">
                  <img src="{{ asset('storage/images/' . $productImage->image) }}" data-mdb-img="{{ asset('storage/images/' . $productImage->image) }}" alt="Gallery image" style="height: 100%; width: 100%; object-fit: cover; cursor: pointer;" class="img-fluid"/>
                </div>
              @endforeach
        </div>  
      </div>
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-center bg-secondary-subtle rounded-end">
      <div class="p-5">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <h3>{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</h3>
        <a class="btn btn-success w-25 mt-2" href="{{ route('site.product.purchase', $product->id) }}">Comprar</a>
      </div>
    </div>
  </div>
</div>  
@endsection

@section('site_scripts')
<script>
  $(document).ready(function(){
    $('.miniature').on('click', function(){
      let imgSrc = $(this).find('img').attr('data-mdb-img');
      $('.ecommerce-gallery-main-img').attr('src', imgSrc);
    });
  });
</script>
@endsection
