<?php
$heder['css'] = $headeCss;
$heder['js'] = $headeJs;
$footer['js'] = $footerJs;
$this->load->view('admin/common/header', $heder);
$this->load->view( $page, $data);
$this->load->view('admin/common/footer', $footer);