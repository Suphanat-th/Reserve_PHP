<!-- Page Content -->
<div class="container">

<!-- Jumbotron Header -->
<header class="jumbotron my-4">
  <h1 class="display-3">CONFIG BY ADMINISTRATOR</h1>
  <p class="lead">Config status by Administrator only</p>
</header>


<!-- Page Features -->
<div class="row text-center">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">USERNAME</th>
      <th scope="col" colspan="2">STATUS</th>
    </tr>
  </thead>
  <tbody id="Get_Config_User">
    
  </tbody>
</table>
</div>
<!-- /.row -->
</div>

<script type="text/javascript">
$(document).ready(function() {
  get_user()
} );
function get_user(){
    $.ajax({
			url: "<?php echo base_url('C_Config/get_user/')?>",
			type: "GET",
   			dataType: 'json',
			success: function(res){
                var Data_Floor = '';
                $num = 1;
                for(i=0;i<res.length;i++){
                    Data_Floor += "<tr>"
                    Data_Floor += "<td>"+$num+"</td>"
                    Data_Floor += "<td>"+res[i].Username+"</td>"
                    Data_Floor += "<td id='"+res[i].ID+"'>"+res[i].Status_Name+"</td>"
                    Data_Floor += "<div>"
                    if(res[i].Status == 1){
                      Data_Floor += "<td><button type='button' class='btn btn-warning' id='"+res[i].ID+"' name='edit"+res[i].ID+"' onclick='edit_status(this.id)' style='display: none'>EDIT</button></td>"
                      Data_Floor += "<td><button type='button' class='btn btn-success' id='"+res[i].ID+"' name='save"+res[i].ID+"' onclick='save_status(this.id)' style='display: none'>SAVE</button></td>"
                      Data_Floor += "<td><button type='button' class='btn btn-danger' id='"+res[i].ID+"' name='cancel"+res[i].ID+"' onclick='cancel_status()' style='display: none'>CANCEL</button></td>"
                    }else{
                      Data_Floor += "<td><button type='button' class='btn btn-warning' id='"+res[i].ID+"' name='edit"+res[i].ID+"' onclick='edit_status(this.id)'>EDIT</button></td>"
                      Data_Floor += "<td><button type='button' class='btn btn-success' id='"+res[i].ID+"' name='save"+res[i].ID+"' onclick='save_status(this.id)' style='display: none'>SAVE</button></td>"
                      Data_Floor += "<td><button type='button' class='btn btn-danger' id='"+res[i].ID+"' name='cancel"+res[i].ID+"' onclick='cancel_status()' style='display: none'>CANCEL</button></td>"
                    }
                    Data_Floor += "</div>"
                    Data_Floor += "</tr>"
                    $num++;
                }
                $("#Get_Config_User").empty();
                $("#Get_Config_User").append(Data_Floor);
			},
			error: function(msg){
				console.log('ERROR :',msg)
			}
    });
    }
function edit_status(id){
      $("#"+id+"").html("<div class'form-group'><select id='select"+id+"' class='form-control'><option value='1' disabled>ADMINISTRATOR</option><option value='2'>EMPLOYEE</option><option value='3' selected>GUEST</option></select></div>");
      $("[name=save"+id+"]").show();
      $("[name=cancel"+id+"]").show();
      $("[name=edit"+id+"]").hide();

}
function save_status(id){
  save_status = $("#select"+id+"").val();

  $.ajax({
			url: "<?php echo base_url('C_Config/Update_status/')?>",
			type: "POST",
         dataType: 'json',
         data:{id : id,status : save_status},
			success: function(res){
         window.location.href = "<?php echo base_url('C_Config')?>";
			},
			error: function(msg){
				console.log('ERROR :',msg)
			}
    });

}
function cancel_status(){
  window.location.href = "<?php echo base_url('C_Config')?>";
}
</script>