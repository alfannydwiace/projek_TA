<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';

// route login
$route['login'] = 'login';

// route dashboard
$route['dashboard'] = 'dashboard';
$route['peternak'] = 'peternak';

// route dashboard
$route['dashboard'] = 'dashboard';
$route['dokter'] = 'dokter';
$route['chat_dokter'] = 'chat_dokter';
// // route untuk halaman blog
$route['blog'] = 'welcome/blog';
$route['blog/(:num)'] = 'welcome/blog/$1';

// route untuk halaman kategori artikel
$route['kategori/(:any)'] = 'welcome/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'welcome/kategori/$1/$s2';

// route untuk halaman cari artikel
$route['search'] = 'welcome/search';
$route['search/(:any)'] = 'welcome/search/$1';
$route['search/(:any)/(:num)'] = 'welcome/search/$1/$2';

// route untuk halaman page
$route['page/(:any)'] = 'welcome/page/$1';

// // route untuk halaman album foto
$route['album'] = 'welcome/album';
$route['album/(:num)'] = 'welcome/album/$1';


// // route untuk halaman album foto
$route['foto'] = 'welcome/foto';
$route['foto/(:num)'] = 'welcome/foto/$1';
$route['foto/(:any)/(:num)'] = 'welcome/foto/$1/$2';


// // route untuk halaman playlist video
$route['playlist'] = 'welcome/playlist';
$route['playlist/(:num)'] = 'welcome/playlist/$1';

// // route untuk halaman album foto
$route['video'] = 'welcome/video';
$route['video/(:num)'] = 'welcome/video/$1';
$route['video/(:any)/(:num)'] = 'welcome/video/$1/$2';

$route['video_detail'] = 'welcome/video_detail';
$route['video_detail/(:num)'] = 'welcome/video_detail/$1';


// route untuk halaman agenda
$route['agenda'] = 'welcome/agenda';
$route['agenda_detail/(:num)'] = 'welcome/agenda_detail/$1';


// route untuk halaman agenda
$route['pusat_unduh'] = 'welcome/pusat_unduh';
$route['pusat_unduh_detail/(:num)'] = 'welcome/pusat_unduh_detail/$1';


$route['send_message'] = 'welcome/send_message';

// route URL SEO untuk artikel
$route['(:any)'] = 'welcome/single/$1';

$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
