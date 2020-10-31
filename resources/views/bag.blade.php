@extends('layouts.project')

@section('content')
<div class="container">
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th>Product img</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody id="bag_body">
        <tr>
          <td colspan="4">Empty Bag</td>
        </tr>
    </tbody>
  </table>
  <a  class="btn btn-danger" href="/order/create" role="button">Order Now</a>
  
</div>
</div>
@endsection

@section('script')
  <script>
    var sumOrder =0;
    var countItems =0;
    var qty = 1;
    var ad ="storage/"

    $(document).ready(function(){
        if(localStorage.bag){
          bag = JSON.parse(localStorage.bag);
          $("#bag_body").empty();
        }
      else bag =[];
     
     
      $("#cart_item").html(bag.length); 
      var i=0;
      for(product of bag){
        for(p of product.images)
        {
        
          $("#bag_body").append("<tr id='bag_row_"+ i +"'><td><img src="+ad+p.img+" style='width: 100px; height: 140px;'></td><td>"+product.name+"</td><td>"+product.price+"</td><td>"+qty+"</td><td>"+ product.price * qty +"</td> <td><a class='btn btn-sm btn-danger' onclick='remove("+ i++ +" , "+product.id+")'>remove</a></td></tr>");
          countItems +=qty;
          sumOrder += (product.price *qty);
        
        } 
      }
     
      $("#bag_body").append("<tr id='bag_row_summry'><td colspan='3'>Total</td> <td>"+countItems+"</td><td>"+ sumOrder +"</td></tr>");
      
      
    });



    function remove(index ,id){     
      bag = JSON.parse(localStorage.bag);

       var i = 0;
        var rslt =0 ;
        for (el of bag){    
          if(el.id == id){
            rslt =i;
            break;            
          }
          i++;
        }      
      countItems -=qty;
      sumOrder -= ( bag[rslt].price *qty);
      bag.splice(rslt , 1);  
      $("#bag_row_"+index).hide(1000);
      localStorage.bag = JSON.stringify(bag);     
      $("#cart_item").html(bag.length);
      $("#bag_row_summry").html("<td colspan='2'>Total</td> <td>"+countItems+"</td><td>"+ sumOrder +"</td>");
    }
    
  </script>

@endsection
@section('pro')
My Cart
@endsection
{{-- @section('proo')
{{  $cat->name }}
@endsection --}}