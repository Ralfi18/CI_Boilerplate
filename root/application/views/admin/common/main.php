<?php
$heder['css'] = $headeCss;
$heder['js'] = $headeJs;
$footer['js'] = $footerJs;
$this->load->view('admin/common/header', $heder);
if ($page && !is_array($page)) {
  $this->load->view( $page, $data);
} else if ($page && count($page) > 0) {
  foreach($page as $singlePage) {
    $this->load->view( $singlePage, $data );
  }
}

$this->load->view('admin/common/footer', $footer);