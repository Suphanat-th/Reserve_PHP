<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url('C_Home')?>">BAR SYSTEMS
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <?php if($_SESSION['status'] == 1) {?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('C_Config')?>">ADMINSTRATOR</a>
          </li>
          <?php if($_SESSION['status'] <= 2) {?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('C_system')?>">SYSTEMS BAR</a>
            </li> 
          <?php }?>
        <?php }?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('C_Setting')?>">SETTING
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><?php echo nbs(10)?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link">USER : <?php echo strtoupper($_SESSION['user']) ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('C_Logout/Logout/')?>">LOG OUT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>