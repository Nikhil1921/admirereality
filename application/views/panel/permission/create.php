<div class="submit-address dashboard-list">
	<h4 class="bg-grea-3"><?= ucwords($name) ?> Access</h4>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<th>Menu</th>
				<th><?= ucwords($role) ?></th>
			</thead>
			<tbody>
				<?php foreach ($menu as $k => $v): ?>
				<tr>
					<td><?= ucwords($k) ?></td>
					<td>
						<div class="col-md-12">
							<?php foreach ($v as $ka => $va): ?>
							<label><?= ucwords($va['sub_menu']) ?></label>
							<form action="<?= base_url('panel/permission/add/').$id ?>" method="POST">
								<div class="row">
									<div class="col-lg-10 col-md-10 col-sm-10">
										<div class="form-group-main">
											<div class="form-group">
												<div class="row">
													<?php $m = $this->main->check('sub_menu',['sub_menu'=>$va['sub_menu']],'permissions');
													foreach (explode(',', $m) as $ke => $ve):
													$op = $this->main->check('operations',['id'=>$ve],'type'); ?>
													<input type="hidden" name="menu" value="<?= $va['url'] ?>">
													<input type="hidden" name="role" value="<?= $role ?>">
													<div class="col-lg-3 col-md-3 col-sm-3">
														<div class="checkbox checkbox-theme checkbox-circle">
															<input id="<?= $op.$va['sub_menu'] ?>" type="checkbox" name="operation[]" <?= (strpos($access,'{"role":"'.$role.'","menu":"'.$va['url'].'","operation":"'.$op.'"}')) ? 'checked' : '' ?> value="<?= $op ?>">
															<label for="<?= $op.$va['sub_menu'] ?>"><?= ucwords($op) ?></label>
														</div>
													</div>
													<?php endforeach ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2">
										<button type="submit" class="btn btn-md btn-primary"><i class="fa fa-save"></i></button>
									</div>
								</div>
							</form>
							<?php endforeach ?>
						</div>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>