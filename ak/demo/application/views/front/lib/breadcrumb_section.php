<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
        <div class="page-title">
            <h1><?php if(isset($breadcrumb)){echo $breadcrumb;} ?></h1>
        </div>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
          <li class="breadcrumb-item active"><?php if(isset($breadcrumb)){echo $breadcrumb;} ?></li>
        </ol>
      </div>
    </div>
  </div>