<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <?= $this->fetch('table-header'); ?>
                    <?= $this->fetch('table-body'); ?>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->fetch('pagination'); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
