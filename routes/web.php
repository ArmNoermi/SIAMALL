<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/tentang-kami', [
    'uses' => 'Tentang_kamiController@index',
    'as' => 'tentang_kami'
]);

Route::get('/pendaftaran', [
    'uses' => 'PendaftaranController@index',
    'as' => 'pendaftaran'
]);

Route::get('/login', 'AuthController@index')->name('login');

Route::post('/user-baru', [
    'uses' => 'PendaftaranController@user_baru',
    'as' => 'user_baru'
]);

Route::post('/post-login', [
    'uses' => 'AuthController@post_login',
    'as' => 'post_login'
]);
Route::get('/logout', 'AuthController@logout');



Route::get('/bio-data', [
    'uses' => 'BiodataController@index',
    'as' => 'bio_data'
]);
Route::post('/bio-data/{users}/complete-bio', [
    'uses' => 'BiodataController@complete_bio',
    'as' => 'complete_bio'
]);
Route::get('/bio-data/{users}/edit-bio', [
    'uses' => 'BiodataController@edit_bio',
    'as' => 'edit_bio'
]);
Route::put('/bio-data/{users}/update', [
    'uses' => 'BiodataController@update',
    'as' => 'bio_data.update'
]);
Route::get('/cetak-bukti-pendaftaran', [
    'uses' => 'BiodataController@cetak_bukti',
    'as' => 'cetak_bukti'
]);
Route::post('/bio-data/{id}/ganti-password', [
    'uses' => 'BiodataController@ganti_password',
    'as' => 'bio_data.ganti_password'
]);
Route::get('/bio-data/{id}/password-baru', [
    'uses' => 'BiodataController@password_baru',
    'as' => 'bio_data.password_baru'
]);
Route::post('/bio-data/{id}/update-password', [
    'uses' => 'BiodataController@update_password',
    'as' => 'bio_data.update_password'
]);

Route::get('/pengumuman', [
    'uses' => 'PengumumanController@index',
    'as' => 'pengumuman'
]);
Route::get('/pengumuman/{id}/lulus', [
    'uses' => 'PengumumanController@lulus',
    'as' => 'pengumuman.lulus'
]);




Route::get('/calon-siswa', [
    'uses' => 'Calon_siswaController@index',
    'as' => 'calon_siswa'
]);
Route::get('/calon-siswa/{id}/verifikasi', [
    'uses' => 'Calon_siswaController@verifikasi',
    'as' => 'verifikasi'
]);
Route::get('/calon-siswa/lulus/{id}', [
    'uses' => 'Calon_siswaController@lulus',
    'as' => 'lulus'
]);
// Route::get('/calon-siswa/terverifikasi', 'Calon_siswaController@terverifikasi');
// Route::get('/calon-siswa/tak_terverifikasi', 'Calon_siswaController@tak_terverifikasi');
Route::get('/calon-siswa/hapus/{id}', [
    'uses' => 'Calon_siswaController@hapus',
    'as' => 'calon_siswa.hapus'
]);
Route::get('/calon-siswa/edit/{id}', [
    'uses' => 'Calon_siswaController@edit',
    'as' => 'calon_siswa.edit'
]);
Route::put('/calon-siswa/update/{id}', [
    'uses' => 'Calon_siswaController@update',
    'as' => 'calon_siswa.update'
]);
Route::get('/calon-siswa/{id}/export', [
    'uses' => 'Calon_siswaController@export',
    'as' => 'calon_siswa.export'
]);



Route::get('/siswa', [
    'uses' => 'SiswaController@index',
    'as' => 'siswa'
]);
Route::get('/siswa/tambah', [
    'uses' => 'SiswaController@tambah',
    'as' => 'siswa.tambah'
]);
Route::post('/siswa/post-tambah', [
    'uses' => 'SiswaController@post_tambah',
    'as' => 'siswa.post_tambah'
]);
Route::get('/siswa/{id}/hapus', [
    'uses' => 'SiswaController@hapus',
    'as' => 'siswa.hapus'
]);
Route::get('/siswa/{id}/edit-siswa', [
    'uses' => 'SiswaController@edit',
    'as' => 'siswa.edit'
]);
Route::put('/siswa/{id}/update-siswa', [
    'uses' => 'SiswaController@update',
    'as' => 'siswa.update'
]);
Route::get('/siswa/{id}/profile', 'SiswaController@profile');
Route::post('/siswa/{id}/tambahNilai', 'SiswaController@tambahNilai');
Route::get('/siswa/{id}/{idmapel}/delete-nilai', 'SiswaController@delete_nilai');
// Route::get('/siswa/profil-saya', 'SiswaController@profil_saya');
Route::put('/siswa/{id}/update-profil', 'SiswaController@update_profil');
// Route::get('/siswa/{id}/password-baru', 'SiswaController@password_baru');
// Route::post('/siswa/{id}/ganti-password', 'SiswaController@ganti_password');
Route::post('/siswa/{id}/update-password', 'SiswaController@update_password');
Route::get('/siswa/profil-saya', [
    'uses' => 'SiswaController@profil_saya',
    'as' => 'profil_saya'
]);
Route::get('/siswa/{id}/password-baru', [
    'uses' => 'SiswaController@password_baru',
    'as' => 'password_baru'
]);
Route::post('/siswa/{id}/ganti-password', [
    'uses' => 'SiswaController@ganti_password',
    'as' => 'ganti_password'
]);
Route::post('/siswa/{id}/update-password', [
    'uses' => 'SiswaController@update_password',
    'as' => 'update_password'
]);

// Route::get('/nilai-siswa', 'Nilai_siswaController@index');
Route::get('/nilai-siswa', [
    'uses' => 'Nilai_siswaController@index',
    'as' => 'nilai_siswa'
]);
Route::get('/nilai-siswa/{id}', 'Nilai_siswaController@nilai_siswa');

// Route::get('/beri-nilai', 'Beri_nilaiController@index');
Route::get('/beri-nilai', [
    'uses' => 'Beri_nilaiController@index',
    'as' => 'beri_nilai'
]);
Route::get('/beri-nilai/penilaian', 'Beri_nilaiController@beri_nilai');
Route::get('/penilaian/{idsiswa}/{idsemester}', 'Beri_nilaiController@penilaian');
Route::post('/penilaian/{id}/tambahNilai', 'Beri_nilaiController@tambahNilai');
Route::get('/penilaian/{id}/{idmapel}/hapus-nilai', 'Beri_nilaiController@hapus_nilai');

Route::get('/guru', [
    'uses' => 'GuruController@index',
    'as' => 'guru'
]);
Route::get('/guru/tambah', 'GuruController@tambah');
Route::post('/guru/post-tambah', 'GuruController@post_tambah');
Route::get('/guru/{id}/edit-guru', 'GuruController@edit');
Route::put('/guru/{id}/update-guru', 'GuruController@update');
Route::get('/guru/{id}/hapus', 'GuruController@hapus');
// Route::get('/profil-saya', 'GuruController@profil_saya');
Route::get('/guru/profil-saya', [
    'uses' => 'GuruController@profil_saya',
    'as' => 'guru.profil_saya'
]);
Route::put('/guru/{id}/update-profil', 'GuruController@update_profil');

Route::get('/guru/{id}/password-baru', [
    'uses' => 'GuruController@password_baru',
    'as' => 'guru.password_baru'
]);
// Route::post('/guru/{id}/ganti-password', 'GuruController@ganti_password');
// Route::post('/guru/{id}/update-password', 'GuruController@update_password');

Route::post('/guru/{id}/ganti-password', [
    'uses' => 'GuruController@ganti_password',
    'as' => 'guru.ganti_password'
]);
Route::post('/guru/{id}/update-password', [
    'uses' => 'GuruController@update_password',
    'as' => 'guru.update_password'
]);

Route::get('/mapel', [
    'uses' => 'MapelController@index',
    'as' => 'mapel'
]);
Route::get('/mapel/tambah', 'MapelController@tambah');
Route::post('/mapel/post-tambah', 'MapelController@post_tambah');
Route::get('/mapel/{id}/hapus', 'MapelController@hapus');
Route::get('/mapel/{id}/edit-mapel', 'MapelController@edit');
Route::post('/mapel/{id}/update-mapel', 'MapelController@update');


Route::get('/materi', [
    'uses' => 'MateriController@index',
    'as' => 'materi'
]);
Route::get('/materi/tambah', 'MateriController@tambah');
Route::post('/materi/post-tambah', 'MateriController@post_tambah');
Route::get('/materi/{id}/hapus', 'MateriController@hapus');
Route::get('/materi/{id}/edit', 'MateriController@edit');
Route::post('/materi/{id}/update', 'MateriController@update');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,calon_siswa,guru']], function () {
    Route::get('/dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);
});

Route::get('/posts', [
    'uses' => 'PostController@index',
    'as' => 'posts'
]);

Route::get('/posts/{id}/edit', 'PostController@edit');
Route::post('/posts/{id}/update', 'PostController@update');
Route::get('/posts/{id}/hapus', 'PostController@hapus');

Route::get('posts/tambah', [
    'uses' => 'PostController@tambah',
    'as' => 'posts.tambah'
]);

Route::post('post/create', [
    'uses' => 'PostController@create',
    'as' => 'post.create'
]);

Route::get('/{slug}', [
    'uses' => 'HomeController@single_post',
    'as' => 'home.single.post'
]);
