<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <?= $this->fetch('form-start'); ?>
            <div class="box-body table-responsive">
                <?= $this->fetch('form-content'); ?>
            </div>
            <div class="box-footer">
                <?= $this->fetch('form-button'); ?>
            </div>
            <?= $this->fetch('form-end'); ?>
        </div>
    </div>
</div>
