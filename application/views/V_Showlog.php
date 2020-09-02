<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
 <html>
<!-- Page Content -->
<div class="container" >
<!-- Page Features -->
<div align="center">
<label><h3>ตารางแสดงประวัติการบันทึกโครงสร้างร้าน</h3></label>
</div>
<div class="row text-center" >
<?php echo $_SESSION['data']?>
</div>
<!-- /.row -->
</div>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
        Show_data_systesm();
});
function Show_data_systesm(){
            $.ajax({
			url: "<?php echo base_url('C_Showlog/Show_Log_Data/')?>",
			type: "GET",
   			dataType: 'json',
			success: function(res){
                var Data_Log = res.data;
                console.log(Data_Log)
                $("#Data_systems").empty();
                $("#Data_systems").append(Data_Log);
			},
			error: function(msg){
				console.log('ERROR :',msg)
			}
		});
        }
</script>