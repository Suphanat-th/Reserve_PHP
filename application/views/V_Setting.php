<!-- Page Content -->
<div class="container">

<!-- Jumbotron Header -->
    <header class="jumbotron my-4">
    <h1 class="display-3">HELLO <?php echo strtoupper($_SESSION['user'])?></h1>
    <p class="lead">Page setting data</p>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        <div class="col-lg-3 col-md-4 mb-4">
            <label><b>USERNAME</b></label><?php echo br()?>
            <label><b>PASSWORD</b></label><?php echo br()?>
            <label><b>STATUS</b></label><?php echo br()?>
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
            <label id="val_username"></label><?php echo br()?>
            <label  id="val_password"></label><?php echo br()?>
            <label  id="val_status"></label><?php echo br()?>
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
            <label><b>PREFIX</b></label><?php echo br()?>
            <label><b>FIRST NAME</b></label><?php echo br()?>
            <label><b>LAST NAME</b></label><?php echo br()?>
            <label><b>E-MAIL</b></label><?php echo br()?>
            <label><b>ID CARD</b></label><?php echo br()?>
            <label><b>AGE</b></label><?php echo br()?>
            <label><b>ADDRESS</b></label><?php echo br()?>
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
            <label  id="val_prefix" ></label><?php echo br()?>
            <label  id="val_firstname" ></label><?php echo br()?>
            <label  id="val_lastname" ></label><?php echo br()?>
            <label  id="val_email" ></label><?php echo br()?>
            <label  id="val_idcard" ></label><?php echo br()?>
            <label  id="val_age"></label><?php echo br()?>
            <label  id="val_address" ></label><?php echo br()?>
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
            <input type="hidden" value="<?php echo $_SESSION['user']?>" id="hidden_user">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEditUser">
            EDIT USER
            </button>
            <!-- <input type="submit" onclick="Edit_user()"> -->
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
        </div>
        <div class="col-lg-3 col-md-4 mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEditProfile">
            EDIT PROFILE
            </button>
            <!-- <input type="submit" onclick="Edit_profile()"> -->
        </div>
    </div>
<!-- /.row -->


<!-- Modal USER -->
<div class="modal fade" id="ModalEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=".col-md-3 .ml-auto">
            <label class="text-modal">USERNAME</label>
            <input class="input-modal" id="edit_username" type="text" disabled>
        </div>
        <div class=".col-md-3 .ml-auto">
            <label class="text-modal">PASSWORD</label>
            <input class="input-modal" id="edit_password" type="text">
        </div>
        <div class=".col-md-3 .ml-auto">
            <label class="text-modal">STATUS</label>
            <input class="input-modal" id="edit_status" type="text" disabled>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Close_modal_User">Close</button>
        <button type="button" class="btn btn-primary" onclick="Edit_user()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- END Modal -->


<!-- Modal PROFILE -->
<div class="modal fade" id="ModalEditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLongTitle">PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">PREFIX</label>
                <select name="edit_prefix" id="edit_prefix" class="input-modal-p">
                    <option value="1">Mr.</option>
                    <option value="2">Mrs.</option>
                    <option value="3">Miss</option>
                </select>
            </div>
            <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">FIRST NAME</label>
                <input class="input-modal-p" id="edit_firstname" type="text">
            </div>
            <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">LAST NAME</label>
                <input class="input-modal-p" id="edit_lastname" type="text">
            </div>
            <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">E-MAIL</label>
                <input class="input-modal-p" id="edit_email" type="text">
            </div>
            <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">ID CARD</label>
                <input class="input-modal-p" id="edit_idcard" type="text">
            </div>
            <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">AGE</label>
                <input type="number" class="input-modal-p" id="edit_age" type="text">
            </div>
            <div class=".col-md-3 .ml-auto">
                <label class="text-modal-p">ADDRESS</label>
                <input class="input-modal-p" id="edit_address" type="text">
            </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Close_modal_Profile">Close</button>
        <button type="button" class="btn btn-primary" onclick="Edit_profile()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- END Modal -->


</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            Show_Profile();
        });
        function Show_Profile(){
            username =  $("#hidden_user").val();
            $.ajax({
                url: "<?php echo base_url('C_Setting/Show_Profile/')?>",
                type: "POST",
                dataType: 'json',
                data: {username : username},
                success: function(res){
                    for(i=0;i<res.length;i++){
                        //Show
                        $("#val_username").html(res[i].Username);
                        $("#val_password").html(res[i].Password);
                        $("#val_status").html(res[i].Status_Name);
                        //Edit
                        $("#edit_username").val(res[i].Username);
                        $("#edit_password").val(res[i].Password);
                        $("#edit_status").val(res[i].Status_Name);


                        //Show
                        $("#val_prefix").html(res[i].Prefix_Name);
                        $("#val_firstname").html(res[i].Firstname);
                        $("#val_lastname").html(res[i].Lastname);
                        $("#val_email").html(res[i].Email);
                        $("#val_idcard").html(res[i].ID_Card);
                        $("#val_age").html(res[i].Age);
                        $("#val_address").html(res[i].Address);
                        //Edit
                        $("#edit_prefix").val(res[i].Prefix);
                        $("#edit_firstname").val(res[i].Firstname);
                        $("#edit_lastname").val(res[i].Lastname);
                        $("#edit_email").val(res[i].Email);
                        $("#edit_idcard").val(res[i].ID_Card);
                        $("#edit_age").val(res[i].Age);
                        $("#edit_address").val(res[i].Address);
                    }
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });
        }
        function Edit_user(){
            username = $("#edit_username").val();
            password_new = $("#edit_password").val();

            $.ajax({
                url: "<?php echo base_url('C_Setting/Update_user/')?>",
                type: "POST",
                dataType: 'json',
                data: {username : username, password : password_new},
                success: function(res){
                    $("#Close_modal_User").click();
                    window.location.href = "<?php echo base_url('C_Setting')?>";
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });
        }
        function Edit_profile(){
            username = $("#edit_username").val();
            prefix_new = $("#edit_prefix").val();
            firstname_new = $("#edit_firstname").val();
            lastname_new = $("#edit_lastname").val();
            email_new = $("#edit_email").val();
            idcard_new = $("#edit_idcard").val();
            age_new = $("#edit_age").val();
            address_new = $("#edit_address").val();

            $.ajax({
                url: "<?php echo base_url('C_Setting/Update_profile/')?>",
                type: "POST",
                dataType: 'json',
                data: {prefix : prefix_new, firstname : firstname_new, lastname : lastname_new, email : email_new, idcard : idcard_new, age : age_new, address : address_new,username : username},
                success: function(res){
                    $("#Close_modal_Profile").click();
                    window.location.href = "<?php echo base_url('C_Setting')?>";
                },
                error: function(msg){
                    console.log('ERROR :',msg)
                }
            });

        }
    </script>
    <style>
    .text-modal{
        padding-left: 60px;
    }
    .text-modal-p{
        padding-left: 60px;
    }
    .input-modal{
        position: absolute;
        right:80px;
    }
    .input-modal-p{
        position: absolute;
        right:80px;
    }
    </style>