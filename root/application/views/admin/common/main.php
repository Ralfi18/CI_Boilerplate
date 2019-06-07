<?php
/**
 * add varaiables
 */
$heder['css'] = $headeCss;
$heder['js'] = $headeJs;
$footer['js'] = $footerJs;
/**
 * add header view
 */
$this->load->view($path.'header', $heder);
/**
 * add main view/s and there data
 */

if ($page && !is_array($page)) {
  $this->load->view($page, $data);
} else if ($page && count($page) > 0) {
  foreach($page as $singlePage) {
    $this->load->view($singlePage, $data);
  }
}
/**
 * add footer view
 */
$this->load->view($path.'footer', $footer);