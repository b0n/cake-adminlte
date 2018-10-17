<?php
use Cake\Core\Configure;

if ($this->exists('breadcrumb')) {
    echo $this->fetch('breadcrumb');
} else {
    $this->Breadcrumbs->prepend(
        '<i class="fa fa-dashboard"></i> ' . __d('localized', 'Home'),
        Configure::read('AdminLTE.links.dashboard')
    );
    echo $this->Breadcrumbs->render();
}
