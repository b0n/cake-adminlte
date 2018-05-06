<?php
use Cake\Core\Configure;
use Cake\Routing\Router;

if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s">', Configure::read('App.language'));
    $this->end();
}

if (!$this->fetch('title') && Configure::read('App.title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}

// Prepend some meta tags
$this->prepend('meta', $this->Html->meta('icon'));
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1'));
if (Configure::read('App.author')) {
    $this->prepend('meta', $this->Html->meta('author', null, [
        'name'    => 'author',
        'content' => Configure::read('App.author')
    ]));
}

// Prepend scripts required by the navbar
$this->prepend('script', $this->Html->script([
    '/Cirici/AdminLTE/js/jquery.min.js',
    '/Cirici/AdminLTE/js/bootstrap.min.js',
    '/Cirici/AdminLTE/plugins/iCheck/icheck.min.js',
]));

// Styles
$this->prepend('css', $this->Html->css([
    '/Cirici/AdminLTE/css/bootstrap.min.css',
    '/Cirici/AdminLTE/css/font-awesome.min.css',
    '/Cirici/AdminLTE/css/ionicons.css',
    '/Cirici/AdminLTE/css/AdminLTE.css',
    '/Cirici/AdminLTE/plugins/iCheck/square/blue.css',
]));

?>
<!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= sprintf('%s | %s', $this->fetch('title'), Configure::read('App.title')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?php if (false) : // TODO ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php endif ?>

    <?php if (false) : // TODO ?>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php endif ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <?= $this->Html->link(Configure::read('AdminLTE.texts.logo'), Configure::read('AdminLTE.links.dashboard'), ['escape' => false]) ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <?= $this->fetch('content'); ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?= $this->fetch('script'); ?>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
