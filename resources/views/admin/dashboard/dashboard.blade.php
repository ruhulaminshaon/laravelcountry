@extends('admin.master')
@section('title','Dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Jquery Count</h4>
                    </div>
                    <div class="content">
                        <div id="chartActivity" class="country_chart">
                            <div id="tabs" >
                              <button class="btn btn-primary btn-sm add_row_button" name="add" >Add Row</button>
                              <div id="tab1">
                                <div class="row">
                                  <div class="col-sm-2" style="margin-right: 10px;"><h5>Name</h5></div>
                                  <div class="col-sm-2" style="margin-right: 10px;"><h5>Quantity</h5></div>
                                  <div class="col-sm-2" style="margin-right: 10px;"><h5>Price</h5></div>
                                  <div class="col-sm-2" style="margin-right: 10px;"><h5>Item total</h5></div>
                                </div>
                                <div class="row_add">
                                  <div class="row">
                                    <div class="col-sm-2 pro_row">
                                      <select class="product">
                                        <option>Selcet Product</option>
                                        <option value="book" data-price="100">Book</option>
                                        <option value="pen" data-price="10">Pen</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-2 qty_row"><input class="add_total" type="number" id="qty" ></div>
                                    <div class="col-sm-2 price_row"><input class="add_total" type="number" readonly></div>
                                    <div class="col-sm-2 tot_row"><input type="text" name="item_total" id="item_total" readonly></div>
                                  </div>

                                </div>
                                <h4>Total Price</h4>
                                <input type="text" id="total">
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>    
        </div>
 
    </div>
</div>
@php
echo "<pre>";
print_r($_SERVER);
echo"</pre>";
@endphp


<!--jquery script section-->
<script>
  $(document).ready(function(){
    $(document).on('change',".product",function(){
      var prod=$("option:selected",this).val();      
      var price=$("option:selected",this).data('price');
      $(this).parents('.pro_row').siblings('.price_row').find(".add_total").val(price);
      
        $("#qty").on("change keyup",function(){
          var qty=$('#qty').val();
          var total_item=$("#item_total").val(qty*price);
          var sum =$("#total").val(qty*price);
          
        });

        // if(prod=="pen"){
        //   var total_v=$("#total").val();
        //   var qty=$('#qty').val("1");
        //   var sum=parseFloat(total_v) + parseFloat(price);
        //   $("#total").val(sum);
        // }else if(prod=="book"){
        //   var total_v=$("#total").val();
        //   var qty=$('#qty').val("1");
        //   var sum=parseFloat(total_v) + parseFloat(price);
        //   $("#total").val(sum);
        // }else{
        //   $("#qty").val("");
        //   $("#item_total").val("");
        //   $("#total").val("");
        // }
      
    });


    $(document).on('click','.add_row_button',function(){
      // var i=0;
      $('.row_add').append('<div class="row all_roow_cool" id="remo"><div class="col-sm-2 pro_row"><select class="product"><option>Selcet Product</option><option value="book" data-price="100">Book</option><option value="pen" data-price="10">Pen</option></select></div><div class="col-sm-2 qty_row"><input class="add_total" type="number" id="qty"></div><div class="col-sm-2 price_row"><input class="add_total" type="number" readonly></div><div class="col-sm-2 tot_row"><input type="text" name="item_total" id="item_total" readonly></div><div class="col-sm-2"><button>X</button></div></div>');

      $('.row_add button').attr("id","row_del");
    });
    $(document).on('click','#row_del',function(){
      var result=confirm("Do you want to remove");
      if(result){
        $(this).closest('#remo').remove();
      }
    });

  });  
</script>

@endsection