<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?php if ($this->fetch('header-actions')) : ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?= $this->fetch('header-actions'); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

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
                <?= $this->fetch('page-numbers'); ?>
            </div>
        </div>
    </div>
</div>
