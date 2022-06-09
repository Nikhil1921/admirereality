<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<?php foreach ($roles as $k => $v): ?>
	<div class="col-lg-3 col-md-3 col-sm-6">
		<a href="<?= base_url('panel/permission/create/').$v['id'] ?>">
			<div class="ui-item bg-active">
				<div class="left">
					<h4></h4>
					<p><?= ucfirst($v['role']) ?></p>
				</div>
				<div class="right">
					<i class="fa fa-user"></i>
				</div>
			</div>
		</a>
	</div>
	<?php endforeach ?>
</div>