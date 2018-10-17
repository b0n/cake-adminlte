<?php
/**
 * @var \App\View\AppView $this
 */

if ($this->exists('footer')) {
    echo $this->fetch('footer');
} else { ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.2
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
<?php } ?>
