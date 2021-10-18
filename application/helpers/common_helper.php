<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function get_user_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_users', array('id_user' => $id))->row_array();
}

function check_absen($id_kelas = 0, $id_sesi = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('id_kelas' => $id_kelas, 'nomor_pertemuan' => $id_sesi, 'id_siswa' => get_id_siswa_by_id_user($CI->session->userdata('id_user'))))->num_rows();
}


function total_siswa_per_sesi($id_kelas = 0, $id_sesi = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('id_kelas' => $id_kelas, 'nomor_pertemuan' => $id_sesi))->num_rows();
}


function waktu_absen($id_kelas = 0, $id_sesi = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('id_kelas' => $id_kelas, 'nomor_pertemuan' => $id_sesi, 'id_siswa' => get_id_siswa_by_id_user($CI->session->userdata('id_user'))))->row_array()['created_at'];
}
function get_kelas_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_kelas', array('id_kelas' => $id))->row_array();
}


function get_nama_kelas_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_kelas', array('id_kelas' => $id))->row_array()['nama_kelas'];
}

function get_nama_kelas()
{
	$CI = &get_instance();
	return $CI->db->get('xx_kelas')->result_array();
}

function get_dosen_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_dosen', array('id_dosen' => $id))->row_array();
}

function get_dosen_by_id_user($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_dosen', array('id_user' => $id))->row_array();
}

function get_nama_dosen()
{
	$CI = &get_instance();
	return $CI->db->get('xx_dosen')->result_array();
}

function get_status_absensi($id_siswa, $id_kelas, $no_pertemuan)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('id_siswa' => $id_siswa, 'id_kelas' => $id_kelas, 'nomor_pertemuan' => $no_pertemuan))->row_array()['status'];
}

function get_nama_dosen_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_dosen', array('id_dosen' => $id))->row_array()['nama_dosen'];
}

function get_id_dosen_by_id_user($id_user = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_dosen', array('id_user' => $id_user))->row_array()['id_dosen'];
}

function get_id_user_by_id_dosen($id_user = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_dosen', array('id_dosen' => $id_user))->row_array()['id_user'];
}

function get_id_user_by_id_siswa($id_user = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_siswa', array('id_siswa' => $id_user))->row_array()['id_user'];
}


function get_id_dosen_by_id_kelas($id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_kelas', array('id_kelas' => $id_kelas))->row_array()['id_dosen'];
}

function get_kelas_by_dosen_id($id_dosen = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_kelas', array('id_dosen' => $id_dosen))->result_array();
}

function get_id_siswa_by_id_user($id_user = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_siswa', array('id_user' => $id_user))->row_array()['id_siswa'];
}

function get_kelas_by_siswa_id($id_dosen = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_peserta', array('id_siswa' => $id_dosen))->result_array();
}



function get_id_kelas_by_id_siswa($id_siswa = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_peserta', array('id_siswa' => $id_siswa))->result_array();
}

function total_siswa($id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_peserta', array('id_kelas' => $id_kelas))->num_rows();
}

function get_nama_siswa_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_siswa', array('id_siswa' => $id))->row_array()['nama_siswa'];
}


function get_siswa_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_siswa', array('id_siswa' => $id))->row_array();
}

function get_siswa_by_id_user($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_siswa', array('id_user' => $id))->row_array();
}




function get_siswa_by_id_kelas($id = [])
{
	$CI = &get_instance();
	return $CI->db->get_where_in('xx_siswa', array('id_siswa' => $id))->result_array();
}

function get_siswa_by_kelas_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_peserta', array('id_kelas' => $id))->result_array();
}

function get_nama_siswa()
{
	$CI = &get_instance();
	return $CI->db->get('xx_siswa')->result_array();
}

function pertemuan1($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 1, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa, 'status' => 1))->row_array();
}

function pertemuan2($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 2, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}

function pertemuan3($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 3, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan4($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 4, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan5($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 5, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan6($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 6, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan7($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 7, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan8($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 8, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan9($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 9, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan10($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 10, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan11($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 11, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan12($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 12, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}
function pertemuan13($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('nomor_pertemuan' => 13, 'id_kelas' => $id_kelas, 'id_siswa' => $id_siswa))->row_array();
}

function persentase($id_siswa = 0, $id_kelas = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_absensi', array('id_kelas' => $id_kelas, 'id_siswa' => $id_siswa, 'status' => 1))->num_rows();
}

function get_pertemuan_by_id($id = 0)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_pertemuan', array('id_pertemuan' => $id))->row_array();
}

function get_nama_pertemuan()
{
	$CI = &get_instance();
	return $CI->db->get('xx_pertemuan')->result_array();
}
