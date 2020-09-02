<!-- Page Content -->
<div class="container">

<!-- Jumbotron Header -->
    <header class="jumbotron my-4">
    <h1 class="display-3">BAR SYSTEMS</h1>
    <p class="lead">Function Back-end</p>
    </header>

        <input type="button" class="bg-info text-white" id="btn_generate"onclick="Show_Generate()" value="GENERATE">
        <input type="button" class="bg-warning text-white" id="btn_layout" onclick="Show_Layout()" value="LAYOUT" >
        <input type="button" class="bg-primary text-white" id="btn_history" onclick="Show_History()"  value="History">
        <input type="button" class="bg-secondary text-white" id="btn_promotion" onclick="Show_Promotion()"  value="Promotion">

    <!-- Page Features -->
    <div class="row text-center">
        <div id="Show_Floor">
        </div>

        <div class="col-xl-12" id="Show_Gen">
            <label><h3>GENERATE LAYOUT TO HOME PAGE</h3></label>
            <input type="number"  id="floor_input" onchange="generate()">
            <label>Floor</label>
        </div>
        <div class="col-xl-12" id="Show_Gen">
            <form id="Send_Data" action="<?php echo base_url('C_system/Add_floor'); ?>"  method="post" enctype="multipart/form-data">
            </form>
        </div>


        <div class="col-xl-12" id="Show_History">
            <iframe src="<?php echo base_url('C_Showlog'); ?>" style="border:none;"  height="800" width="800" title="Iframe Example" ></iframe>
        </div>


        <div class="col-xl-12" id="Show_Promotion">
            <label><h3>Create Promotion</h3></label>
            <div>
            <label>Value of promotion</label>
            <input type="number" id="Set_Promotion" onchange="promotion()">
            </div>
        </div>
        <div class="col-xl-12" id="Show_Promotion">
            <form id="Promotion_Data" action="<?php echo base_url('C_system/Add_Promotion'); ?>"  method="post" enctype="multipart/form-data">
            </form>
        </div>
    </div>
<!-- /.row -->

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            generate()
            Show_Floor()
            Show_Layout()
        });
        function generate(){
            var floor = $("#floor_input").val();
            var create_input="";
            var i=1;
            for(i=1;i<=floor;i++){
                create_input += "<div>"
                create_input += "<label>LAYOUT FLOOR "+i+"</label>"
                create_input += "<div class='custom-file'>"
                create_input +=  "<input type='file' class='custom-file-input' id='img"+i+"' name='img"+i+"' require accept='image/*'>"
                create_input +=  "<label class='custom-file-label' for='customFile'>Choose file</label>"
                create_input += "</div>"
                create_input += "<label>TABLE IN FLOOR "+i+"</label>"
                create_input += "<input type='number' id='reservation_table"+i+"' name='reservation_table"+i+"'>"
                create_input += "</div>"
            }
            create_input += "<input type='hidden' id='floor_index' name = 'floor_index' value='"+floor+"'>"
            if(floor != '' && floor != 0){
                create_input += "<input type='submit'  value='SAVE'>"
            }
            $("#Send_Data").empty();
            $("#Send_Data").append(create_input);
        }
        function promotion(){
            var promotion = $("#Set_Promotion").val();
            var create="<label style='color:red'>Type (gif | jpg | png | jpeg | pdf) ***max_height=700  ***max_width=400</label>";
            var i=1;
            for(i=1;i<=promotion;i++){
                create += "<div>"
                create += "<label>PROMOTION "+i+"</label>"
                create += "<div class='custom-file'>"
                create +=  "<input type='file' class='custom-file-input' id='img"+i+"' name='img"+i+"' require accept='image/*'>"
                create +=  "<label class='custom-file-label' for='customFile'>Choose file</label>"
                create += "</div>"
                // create += "<input type='number' id='reservation_table"+i+"' name='reservation_table"+i+"'>"
                create += "</div>"
            }
            create += "<input type='hidden' id='Pic_Name' name = 'Pic_Name' value='"+promotion+"'>"
            if(promotion != '' && promotion != 0){
                create += "<input type='submit'  value='SAVE'>"
            }
            $("#Promotion_Data").empty();
            $("#Promotion_Data").append(create);
        }
        function Show_Floor(){
            $.ajax({
			url: "<?php echo base_url('C_system/Show_Floor/')?>",
			type: "GET",
   			dataType: 'json',
			success: function(res){
                var Data_Floor = '';
                for(i=0;i<res.length;i++){
                    Data_Floor += "<div class='row'>"
                    Data_Floor += "<div class='col-xl-6'>"
                    Data_Floor += "<label><h3>LAYOUT FLOOR "+res[i].Floor_index+"</h3></label>";
                    Data_Floor += "<img class='pic' src='<?php echo base_url('IMG/');?>"+res[i].Floor_img+"' width='300px' height='300px'>";
                    Data_Floor += "</div>"
                    Data_Floor += "<div class='col-xl-6'>"
                    Data_Floor += "<label><h3>TABLE IN FLOOR "+res[i].Floor_index+" : "+res[i].Floor_table+" TABLE</h3></label>"
                    Data_Floor += "</div>"
                    Data_Floor += "</div>"
                }
                $("#Show_Floor").empty();
                $("#Show_Floor").append(Data_Floor);
			},
			error: function(msg){
				console.log('ERROR :',msg)
			}
		});
        }
        function Show_Generate(){
            $("#Show_Floor").hide();
            $("#Show_Gen").show();
            $("#Show_History").hide();
            $("#Show_Promotion").hide();
            
            $('#btn_generate').css({
                'width': '150px',
                'height': '60px',
                'font-size' : '25px',
                'margin-bottom' : '50px'
           });
           $('#btn_layout').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_history').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_promotion').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
        }
        function Show_Layout(){
            $("#Show_Floor").show();
            $("#Show_Gen").hide();
            $("#Show_History").hide();
            $("#Show_Promotion").hide();

            $('#btn_layout').css({
                'width': '150px',
                'height': '60px',
                'font-size' : '25px',
                'margin-bottom' : '50px'
           });
           $('#btn_generate').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_history').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_promotion').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
        }
        function Show_History(){
            $("#Show_Gen").hide();
            $("#Show_Floor").hide();
            $("#Show_History").show();
            $("#Show_Promotion").hide();

            
            $('#btn_history').css({
                'width': '150px',
                'height': '60px',
                'font-size' : '25px',
                'margin-bottom' : '50px'
           });
           $('#btn_generate').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_layout').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_promotion').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
        }
        function Show_Promotion(){
            $("#Show_Gen").hide();
            $("#Show_Floor").hide();
            $("#Show_History").hide();
            $("#Show_Promotion").show();

            
           $('#btn_promotion').css({
                'width': '150px',
                'height': '60px',
                'font-size' : '25px',
                'margin-bottom' : '50px'
           });
            $('#btn_history').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_generate').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });
           $('#btn_layout').css({
                'width': '80px',
                'height': '30px',
                'font-size' : '10px'
           });

        }
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <style>
        .pic{
            padding-top:10px;
            padding-bottom:10px;
        }
    </style>