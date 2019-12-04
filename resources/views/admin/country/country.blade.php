@extends('admin.master')
@section('title','Country')
@section('content')
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Country Info</h4>
                        <h2 class="rr"></h2>
                            

                    </div>
                    
                    <div class="content">
                        <div class="form-group row">
                            <div class="col-xs-3">
                              <label for="sel1">Country</label>
                              <select class="form-control" id="re">
                                <option>Select Country</option>
                              </select>
                            </div>
                        </div>

                        <table class="table table-hover table-striped rea ">
                            <thead> 
                                <tr class="country_tr">            
                                    <th>Country Name</th>
                                    <th>Capital Name</th>
                                    <th>Area Code</th>
                                    <th>Calling Code</th>
                                    <th>Details</th>
                                </tr>
                            </thead> 
                            <thead>
                                <tr class="country_ltr" style="display: none">            
                                    <th style="width: 250px">Country Name</th>
                                    <th style="width: 250px">Capital Name</th>
                                    <th style="width: 250px">Area Code</th>
                                    <th style="width: 250px">Calling Code</th>
                                    <th style="width: 250px">Details</th>
                                </tr>                  
                            </thead>
                            <tbody class="re">
                               
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- Modal -->
      <div class="modal fade" id="country_modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="conname"></h4>
              <div class="d"><img class="im" src="" width="100px"></div>
            </div>
            <div class="modal-body">
              <table class="poi">
                <tr>
                    <th>Alpha2Code:</th>
                    <td id="alpha2Code"></td>
                </tr>
                <tr>
                    <th>Alpha3Code:</th>
                    <td id="alpha3Code"></td>
                </tr>
                <tr>
                    <th>CallingCodes:</th>
                    <td id="callingCodes"></td>
                </tr>
                <tr>
                    <th>Capital:</th>
                    <td id="capital"></td>
                </tr>
                <tr>
                    <th>Region:</th>
                    <td id="region"></td>
                </tr>
                <tr>
                    <th>Population:</th>
                    <td id="population"></td>
                </tr>
                <tr>
                    <th>Demonym:</th>
                    <td id="demonym"></td>
                </tr>
                <tr>
                    <th>Area:</th>
                    <td id="area"></td>
                </tr>
                <tr>
                    <th>Gini:</th>
                    <td id="gini"></td>
                </tr>
                <tr>
                    <th>NativeName:</th>
                    <td id="nativeName"></td>
                </tr>
                <tr>
                    <th>NumericCode:</th>
                    <td id="numericCode"></td>
                </tr>
                <tr>
                    <th>AltSpellings</th>
                    <td id="altSpellings0"></td>
                    <td id="altSpellings1"></td>
                </tr>
                <tr>
                    <th>Latlng</th>
                    <td id="latlng"></td>
                    <td id="latlng1"></td>
                </tr>
                <tr>
                    <th>Timezones</th>
                    <td id="timezones"></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


</div> 

<script>
//select option show
$( document ).ready(function() {
    $("#re").select2({   });
    $.ajax({
        type:"get",             
        url:"https://restcountries.eu/rest/v2/all",
        success:function(data){                 
            if(data.length>0){                    
                $(data).each(function(e,v){
                    $('#re').append("<option value="+v.name+">"+v.name+"</option>");
                });
            }
        }
    });
});

$(document).ready(function(){
    $(document).on('change','#re',function(){
        var country=$('option:selected',this).text();
        $('.country_row').each(function(key,value){
            // console.log(value);
            $(value).find('.rw').each(function(tkey,tvalue){
            console.log(tvalue);
                var country_find=$(tvalue).text();
                if(country_find==country){
                    var ind=$(tvalue).parents('.country_row').index();
                    $(".country_tr").css({"display":"none"});
                    $(".country_ltr").css({"display":"block"});
                    $(".country_row").css({"display":"none"});
                    $(".rw").css({"width":"250px"});
                    $(".country_row:eq("+ind+")").css({"display":"block"});
                }
            });
        });
    });
});

//all data show
$(document).ready(function(){
    $.ajax({
        type:"get",
        url:"https://restcountries.eu/rest/v2/all",
        dataType:'json',
        success:function(data){
            $(data).each(function(key,value){
                $('.re').append(
                    "<tr class='country_row'><td class='rw' value="+value.name+">"+value.name+"</td><td class='rw'>"+value.capital+"</td><td class='rw'>"+value.area+"</td><td class='rw'>"+value.callingCodes+"</td><td class='rw'><button type='submit' class='btn btn-warning country_click' data-toggle='modal' data-target='#country_modal' value='"+value.name+"' name='country_click'>View</button></td></tr>"
                    );
            });
        }
    });
});
    
//when click button
$(document).on('click','.country_click',function(){
    var conname=$(this).val();
    $.ajax({
        type:'get',
        url:"https://restcountries.eu/rest/v2/all",
        success:function(data){
            //data = JSON.parse(data);
            // console.log(data[0].callingCodes[0]);
            $(data).each(function(e,v){
                if(conname==v.name){
                    // console.log(v.callingCodes[0]);
                    $('.im').attr('src',v.flag);
                    $('#conname').text(v.name);
                    $('#alpha2Code').text(v.alpha2Code);
                    $('#alpha3Code').text(v.alpha3Code);
                    $('#callingCodes').text(v.callingCodes[0]);
                    $('#capital').text(v.capital);
                    $('#region').text(v.region);
                    $('#population').text(v.population);
                    $('#demonym').text(v.demonym);
                    $('#area').text(v.area);
                    $('#gini').text(v.gini);
                    $('#nativeName').text(v.nativeName);
                    $('#numericCode').text(v.numericCode);
                    $('#altSpellings0').text(v.altSpellings[0]);
                    $('#altSpellings1').text(v.altSpellings[1]);
                    $('#latlng').text(v.latlng[0]); 
                    $('#latlng1').text(v.latlng[1]);
                    $('#timezones').text(v.timezones);      
                }
            });
        }
    });
});

</script>
@endsection

