<?php

function check_logged_in()
{
	$ci = get_instance(); //Call Libarary CI

	if (!$ci->session->userdata('username')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('kode_role');
		$menu = $ci->uri->segment(1);

		if ($role_id == 2 && $menu == 'admin') {
			redirect('auth');
		}
	}
}
