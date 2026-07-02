<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta nama="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'GeoSchool GIS' ?></title>
    <!-- CSS dan lainnya -->
</head>
<body>
    <?= $this->include('layouts/header_admin'); ?>
    <?= $this->include('layouts/sidebar_admin'); ?>
    
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>
    
    <?= $this->include('layouts/footer_admin'); ?>
</body>
</html> 