<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/karyawan/calon-karyawan', 'Karyawan::calonKaryawan');
$routes->get('/karyawan/calon-karyawan/form', 'Karyawan::form');
$routes->post('/karyawan/calon-karyawan/save', 'Karyawan::save');
$routes->get('/e-training/materi', 'Etraining::materi');
$routes->get('/e-training/materi/form', 'Etraining::formMateri');
$routes->post('/e-training/materi/upload', 'Etraining::uploadMateri');
$routes->get('/e-training/video', 'Etraining::video');
$routes->get('/e-training/video/form', 'Etraining::formVideo');
$routes->post('/e-training/video/upload', 'Etraining::uploadVideo');
$routes->get('/e-training/diskusi-umum', 'Etraining::diskusi');
$routes->get('/e-training/diskusi-umum/form', 'Etraining::formDiskusi');
$routes->post('/e-training/diskusi-umum/save', 'Etraining::saveDiskusi');
$routes->get('/e-training/diskusi-umum/(:num)', 'Etraining::detailDiskusi/$1');
$routes->post('/e-training/diskusi-umum/komentar', 'Etraining::tambahKomentar');
// $routes->get('/karyawan/cetak-pdf', 'KaryawanController::cetakPdf');
$routes->get('karyawan/export-pdf/(:num)', 'Karyawan::exportPdf/$1');

$routes->post('wilayah/getKabupaten', 'Karyawan::getKabupaten');
$routes->post('wilayah/getKecamatan', 'Karyawan::getKecamatan');
$routes->post('wilayah/getKelurahan', 'Karyawan::getKelurahan');