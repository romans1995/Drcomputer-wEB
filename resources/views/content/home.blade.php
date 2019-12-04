
@extends('master')
@section('main_content')
<style>
  .slick-arrow-1 .slick-arrow {
    margin-top: 250px;
  }
  .slider-info .slider-info-inner {
    position: relative;
    top: 72%;
    transform: translateY(-50%);
}
ul.slick-dots {
  margin: -511px;
    padding: 0px;
    visibility:hidden;
}

.slick-slide {
  height: 100% !important;
}

.one-product {
  height: 60px;
  background-color:#FAFAFA;
  color:#666666;
  transition: 0.4s;
}

.one-product:hover {
  background-color:#DADADA;
  cursor:pointer;
  transition: 0.4s;
  color:#666666;
}

</style>

                           
                         


<div class="slider-area  plr-185  mb-80 hidden-xs" style="height:100% !important;">
            <div class="container-fluid">
                <div class="slider-content">
                    <div class="row">                       
                          <div class="active-slider-1 slick-arrow-1 ">
                          @foreach($products as $product)
                          <div class="col-md-12 ">
                                <div class="layer-1">
                                    <div class="slider-img">
                                        <img src="{{ asset('images/'. $product['pimage'])}}" alt="">
                                    </div>
                                    <div class="slider-info gray-bg">
                                        <div class="slider-info-inner" style="position:relative; top:50%;">
                                            <h1 class="slider-title text-uppercase-fluid text-black" style="margin: -2px 0px 127px 0px;">{{$product['ptitle']}}</h1>
                                            <div class="slider-brief-fluid text-black">
                                                <p style="position: absolute; top: 46px;">{!!$product['particle']!!}</p>
                                                
                                            </div>
                                            
                                            <a href="{{url('shop/'.$product->categorie_id.'/'.$product->purl)}}"
                                            class="button extra-small button-black">
                                                <span class="text-uppercase">Buy now</span>
                                                
                                            </a>
                                        </div>
                                    </div>
                                    </div>    
                             </div>    
                             @endforeach   
                         </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- end-slide-show -->
<section class="engine"><a></a></section>
<section class="header3 cid-rqIRgyMGy6 mbr-parallax-background" id="header4-f">

  <div class="row">
    <div class="col-12">
      
    
    </div>
  </div>
  <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);">
  </div>

  <div class="container">
    <div class="form-group">
      <div class="media-container-row">

        

      </div>
    </div>

    <div class="media-content">
      <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">
        
      </h1>

      <div class="mbr-section-text mbr-white pb-3 ">
        
      </div>
      <div class="mbr-section-btn">
      
      </div>
    </div>
  </div>
  </div>

</section>


</section>
<script type="text/javascript">
  let products = '<?php echo ($products) ?>';
  products = products.replace(/\r?\n|\r/g,'',);
  products = JSON.parse(products);

  function filter() {
    let index = 0;
    document.getElementById('filtered-products').innerHTML = '';
    let fullText = document.getElementById('search').value;
    if (fullText === '') {
      
    } else {
      const filteredProducts = products.filter(
        currProduct =>
          currProduct.ptitle.toLowerCase().match(fullText.toLowerCase()))
      filteredProducts.forEach(product=> {
        if (index < 5) {
          document.getElementById('filtered-products').innerHTML += `<a href="./shop/${product.categorie_id}/${product.purl}"><div class="one-product"><img src="./images/${product.pimage}" width="40" height="40" style="margin:10px;"><span style="font-size:15px; font-weight:bold; color:black; font-family:arial; position:relative; bottom:10px;">${product.ptitle}</span><span style="float:right; position:relative; top:17px; right:10px; font-weight:bold;">₪${product.price}</span><br><span style="position: relative;
          left: 60px;
          font-size: 11px;
          bottom: 30px;">${product.particle}</span></div></a>`;
          index++;
        }
      });
    }
  }
</script>
@endsection


