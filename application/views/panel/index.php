<?php defined('BASEPATH') OR exit('No direct script access allowed'); $role = $this->session->userdata('role'); 
$id = $this->session->userdata('id'); ?>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <a href="<?= base_url('panel/commercial') ?>">
            <div class="ui-item bg-active">
                <div class="left">
                    <h4>Commercial</h4>
                    <p>Total : <?= ($role == 'builder') ? $this->main->count('commercial',['builder' => $id, 'is_delete'=>0]) : $this->main->all('commercial',['is_delete'=>0]) ?></p>
                </div>
                <div class="right">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <a href="<?= base_url('panel/residential') ?>">
            <div class="ui-item bg-active">
                <div class="left">
                    <h4>Residential</h4>
                    <p>Total : <?= ($role == 'builder') ? $this->main->count('residential',['builder' => $id, 'is_delete'=>0]) : $this->main->all('residential',['is_delete'=>0]) ?></p>
                </div>
                <div class="right">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </a>
    </div>
</div>