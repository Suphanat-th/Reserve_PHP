<!-- Page Content -->
<div class="container">
<!-- Jumbotron Header -->
<div class="col-xl-12">
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators" id="indicators">
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner" id="promotion">
    </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class ="row text-center " style="padding-top:50px,">
  <div class="col-xl-12" id="layout_Pic"> 

  </div>
</div>
<div class="row" style="padding-top:50px">
  <div class="col-3" id="active_table">
      <select id="read" class="custom-select" onchange="Show()">
        <option value ="0">ALREADY</option>
        <option value="1">RESERVE</option>
        <option value="ALL">ALL</option>
      </select>
  </div>
  <div class="col-6">
  </div>
  <div class="col-3" id="select_floor">
  <select id="page" class="custom-select" onchange="Show()">
      <option value="1">FLOOR 1</option>
      <option value="2">FLOOR 2</option>
      <option value="3">FLOOR 3</option>
      <option value="ALL">ALL</option>
    </select>
  </div>
</div>

<table class="table table-bordered table-dark text-center" id="show_floor">

</table>
</div>
<script>
$(document).ready(function(){
  Show();
});
function Val_floor(){
  $.ajax({
                url: "<?php echo base_url('C_Home/Show_Promotion/')?>",
                type: "GET",
                dataType: 'json',
                success: function(res){
                     for(i=0;i<res.length;i++){
                       target = "<li data-target='#demo' data-slide-to='"+i+"'></li>";

                       pro = "<div class='carousel-item active'>";
                       pro += "<img src='<?php echo base_url('IMG/');?>/"+res[i].Pic_Name+"'>";
                       pro += "</div>";
                     }

                $("#indicators").empty();
                $("#indicators").append(target);


                $("#promotion").empty();
                $("#promotion").append(pro);
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });
}
function Show(){
  floor = $("#page").val();
  read = $("#read").val();
  //   if (document.getElementById('read').checked) {
  //     rate_value = document.getElementById('read').value;
  //   }
  // console.log(rate_value)
             $.ajax({
                url: "<?php echo base_url('C_Home/Show_Promotion/')?>",
                type: "GET",
                dataType: 'json',
                success: function(res){
                     for(i=0;i<res.length;i++){
                       target = "<li data-target='#demo' data-slide-to='"+i+"'></li>";

                       pro = "<div class='carousel-item active'>";
                       pro += "<img src='<?php echo base_url('IMG/');?>/"+res[i].Pic_Name+"'>";
                       pro += "</div>";
                     }

                $("#indicators").empty();
                $("#indicators").append(target);


                $("#promotion").empty();
                $("#promotion").append(pro);
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });


            $.ajax({
                url: "<?php echo base_url('C_Home/Show_Pic/')?>",
                type: "GET",
                dataType: 'json',
                success: function(res){
                        layout = "<label><h1>LAYOUT BAR</h1></label>";
                        layout+= "<div class='col-sm-3'></div>";
                      for(i=0;i<res.length;i++){
                        layout+= "<img style='padding-right:20px' src='<?php echo base_url('IMG/');?>"+res[i].Floor_img+"'>";
                      }
                        layout+= "<div class='col-sm-3'></div>";

                    $("#layout_Pic").empty();
                    $("#layout_Pic").append(layout);
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });


            $.ajax({
                url: "<?php echo base_url('C_Home/Show_Floor/')?>",
                type: "POST",
                dataType: 'json',
                data: {floor : floor, read : read},
                success: function(res){
                  table = 1;
                       set_floor = "<thead >";
                       set_floor += "<tr>";
                       set_floor += "<th scope='col'>No.</th>";
                       set_floor += "<th scope='col'>CODE TABLE</th>";
                       set_floor += "<th scope='col'>TOOLS</th>";
                       set_floor += "</tr>";
                       set_floor += "</thead>";
                       set_floor += "<tbody>";

                      for(i=0;i<res.Floor_data.length;i++){
                        if(res.Floor_data.length == 0){
                            set_floor += "<tr scope='row'>";
                            set_floor += "<td colspan='3'>NO DATA</td>";
                            set_floor += "</tr>";
                        }else{
                             set_floor += "<tr scope='row'>";
                             set_floor += "<td>"+table+"</td>";
                             set_floor += "<td id='"+res.Floor_data[i].Re_Code+"'>"+res.Floor_data[i].Re_Code+"</td>";
                            if(res.Floor_data[i].isReserve == 0){
                             set_floor += "<td><button id='"+res.Floor_data[i].Re_Code+"' class='btn btn-success' onclick='Reserve(this.id)'>RESERVE</button></td>";
                             set_floor += "</tr>";
                            }else{
                             set_floor += "<td><button id='"+res.Floor_data[i].Re_Code+"' class='btn btn-secondary' disabled>RESERVE</button></td>";
                             set_floor += "</tr>";
                            }
                        }
                        table++;
                      }
                      set_floor += "</tbody>";


                 $("#show_floor").empty();
                 $("#show_floor").append(set_floor);
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });
}
function Reserve(id){
  id_user = <?php echo $_SESSION['id'] ?>;
  // var today = new Date();
  // var dd = String(today.getDate()).padStart(2, '0');
  // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  // var yyyy = today.getFullYear();

  // today = yyyy + '/' + mm + '/' + dd;

  $.ajax({
    url: "<?php echo base_url('C_Home/Insert_Reserve/')?>",
    type: "POST",
    dataType: 'json',
    data: {id : id_user, code : id},
    success: function(res){
      window.location.href = "<?php echo base_url('C_Home')?>";
    },
    error: function(msg){
        console.log('ERROR :',msg)
    }
});
}
</script>
<style>
  .carousel-inner img {
    width: 100%;
    height: 30%;
  }
</style>