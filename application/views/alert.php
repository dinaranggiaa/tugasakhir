<?php if($this->session->has_userdata('warning-kriteria')) { ?>
<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;<?= $this->session->flashdata('warning-kriteria');?> 
</div>
<?php } ?>

<?php if($this->session->has_userdata('warning-inputperbandingan')) { ?>
<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="fa fa-exclamation-triangle" aria-hidden="true"> </i>&nbsp;&nbsp;<?= $this->session->flashdata('warning-inputperbandingan');?>
</div>
<?php } ?>

<?php if($this->session->has_userdata('info-penilaian')) { ?>
<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="fa fa-check" aria-hidden="true"> </i>&nbsp;&nbsp;<?= $this->session->flashdata('info-penilaian');?>
</div>
<?php } ?>

<?php if($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;<?= $this->session->flashdata('success');?>
</div>
<?php } ?>

