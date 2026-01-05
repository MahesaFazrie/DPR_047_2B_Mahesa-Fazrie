<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Aplikasi Gaji DPR') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Gaji DPR</a>
        <div>
            <a href="/anggota" class="btn btn-outline-light btn-sm">Data Anggota</a>
            <a href="/logout" class="btn btn-danger btn-sm ms-2">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
