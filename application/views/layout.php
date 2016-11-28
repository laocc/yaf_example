<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <?php
    /**
     * @var $_title ;
     * @var $_meta ;
     * @var $_css ;
     * @var $_js_head ;
     * @var $_js_body ;
     * @var $_js_footer ;
     * @var $_js_defer ;
     * @var $_view_html ;
     */
    ?>
    <?= $_meta; ?>
    <?= $_css; ?>
    <?= $_js_head; ?>
    <title><?= $_title ?></title>
</head>
<body>
<?php include 'nav.php'; ?>
<?= $_js_body ?>
<?= $_view_html ?>
</body>
<?= $_js_footer ?>
<?= $_js_defer ?>
</html>