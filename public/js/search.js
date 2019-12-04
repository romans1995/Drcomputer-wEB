
 




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