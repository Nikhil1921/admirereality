<div class="submit-address dashboard-list">
	<h4 class="bg-grea-3">Property Gallery</h4>
	<div class="row pad-20">
		<div class="col-lg-12">
			<div id="myDropZone" class="dropzone dropzone-design" data-href="<?= base_url('panel/commercial/imageUpload/').$this->session->flashdata('resi_id') ?>">
				<div class="dz-default dz-message"><span>Drop files here to upload property Images</span></div>
			</div>
		</div>
	</div>
	<?php if ($images): ?>
	<div class="col-md-12">
		<div class="row">
			<?php foreach (explode(',', $images) as $k => $v): ?>
			<div class="col-md-2 remove-image">
				<img src="<?= asset() ?>img/properties/commercial/<?=$v?>" height="100" width="100">
				<button onclick="return false;" data-href="<?= base_url('panel/commercial/removeImage/').$v.'/'.$this->session->flashdata('resi_id') ?>" class="remove-img btn btn-danger"><i class="fa fa-trash"></i></button>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<?php endif ?>
	<div class="row pad-20">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<a href="<?= base_url('panel/commercial')?>" class="btn btn-md button-theme">Back to Properties</a>
		</div>
	</div>
</div>