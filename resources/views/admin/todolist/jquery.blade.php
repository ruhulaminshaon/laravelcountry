@extends('admin.master')
@section('title')
 jQuery
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Jquery Todo list</h4>
                        <button class="btn btn-info btn-sm pull-right add_project">Add Project</button>
                        <button class="btn btn-warning btn-sm pull-right add_row">Add Row</button>
                    </div>
                    
                    <div class="content tabs">
                        
                        <ul id="main_tab">
                            <li><a href="#tabs-1">Project</a><button class="cls_bt">x</button></li>
                            <li><a href="#tabs-2">Work</a><button class="cls_bt">x</button></li>
                        </ul>
                        <div id="tabs-1">
                            <ol>
                                <li><input type="checkbox"> It is working.</li>
                                <li><input type="checkbox"> Working.</li>
                            </ol>
                        </div>
                        <div id="tabs-2">
                            <ol>
                                <li><input type="checkbox"> It is working.</li>
                                <li><input type="checkbox"> Working.</li>
                                <li><input type="checkbox"> It is working.</li>
                                <li><input type="checkbox"> Working.</li>
                            </ol>
                        </div>   
                    </div>
                    
                </div>
            </div>
           
        </div>
    </div>
    

</div> 
<div id="dialog_project" style="display: none;">
    <lable>Project Field Name</lable>
    <input type="text" id="project_name">
</div>
<div id="row_project" style="display: none;">
    <lable>Row Name</lable>
    <input type="text" id="row_name">
</div>

<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="form-group row">
                        <div class="col-xs-4 header">
                            <h4>Country</h4>
                            <select class="form-control option_show">
                                <option>Select Country</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="content">
                        <div class="row country_row_header">
                            <div class="col-sm-3">Name</div>
                            <div class="col-sm-3">Capital Name</div>
                            <div class="col-sm-3">Area Code</div>
                            <div class="col-sm-3">Details</div>
                        </div>
                        <div class="row country_row_show">
                            
                        </div>
                    </div>
                    
                </div>
            </div>
           
        </div>
    </div>
    

<!-- Modal -->
  <div class="modal fade" id="country_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <table>
              <thead></thead>
              <tbody class="body_country_show">
                  
              </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--model end-->
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            type:"get",
            url:"https://restcountries.eu/rest/v2/all",
            success:function(data){
                if(data.length>0){
                    $(data).each(function(key,value){
                        $('.country_row_show').append("<div class='col-sm-3 name_col'>"+value.name+"</div><div class='col-sm-3'>"+value.capital+"</div><div class='col-sm-3'>"+value.area+"</div><div class='col-sm-3'><button class='btn btn-warning'>View</button></div>");
                    });
                }
            }
        });
        $(".country_row_header").css({"color":"red","font-size":"20px","margin-bottom":"10px"});

        $(".option_show").select2({});
        $.ajax({
            type:"get",
            url:"https://restcountries.eu/rest/v2/all",
            success:function(data){
                if(data.length>0){
                    $(data).each(function(i,v){
                        $(".option_show").append("<option value="+v.name+">"+v.name+"</option>");
                    });
                }
            }
        });

        $(document).on("change",".option_show",function(){
            var option_country_select=$("option:selected",this).val();
            $(".country_row_show").each(function(i,v){
               $(v).find(".name_col").each(function(ke,ve){
                    var name_coll=$(ve).text();
                    if(option_country_select==name_coll)
                    {
                        var count_name=$(ve).parents(".country_row_show").index();
                        $(".country_row_show").css({"display":"none"});
                        $(".country_row_show:eq("+count_name+")").css({"display":"block"});
                    }
               });
            });
        });
    });
</script>
<script>

    $(function(){
        $(".tabs").tabs().css({"margin":"70px","border":"1px solid chartreuse"});
        $("#main_tab").css({"background":"azure","border":"1px solid azure"});
        $(".add_row").css({"margin-right":"10px"});
        $("ul").sortable({axis:'x',containment:"#main_tab"});
        $("ol").sortable({axis:'y',containment:".tabs"});

        //ul project button
        $(".add_project").click(function(){
            $("#dialog_project").dialog({
                modal:true,
                width:400,
                resizable:false,
                show:{effect:"explode",duration:1000},
                hide:{effect:"bounce",duration:1000},
                title:"Ul line project",
                buttons:{
                    "Add new project":function(){
                        var project_name=$("#project_name").val();
                        var na=$("<li><a href=#"+project_name+">"+project_name+"</a><button class='cls_bt' id='local_clear'>x</button></li>").appendTo('#main_tab');

                        $(".tabs").tabs("refresh");
                        $("#project_name").val("");
                        $(this).dialog("close");
                        
                    },
                    "cancel":function(){
                        $("#name").val("");
                        $(this).dialog("close");
                    }
                },

            });
        });
        $("#dialog_project").css({"background-color":"beige"});
        
        //row button
        $(".add_row").click(function(){
            $("#row_project").dialog({
                modal:true,
                width:400,
                resizable:false,
                show:{effect:"blind",duration:1000},
                hide:{effect:"explode",duration:1000},
                title:"Row Field",
            });
        });
    });
    // $(document).ready(function(){
    //     $(document).on("click","#local_clear",function(){

    //     });
    // });
</script>
@endsection

<!-- ocr is online image text editor -->