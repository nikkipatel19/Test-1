<?php
namespace Opencart\Install\Controller\Startup;
class Upgrade extends \Opencart\System\Engine\Controller {
	public function index(): void {
		$upgrade = false;

		if (is_file(DIR_OPENCART . 'config.php') && filesize(DIR_OPENCART . 'config.php') > 0) {
			$upgrade = true;
		}

		if (isset($this->request->get['route']) && (substr($this->request->get['route'], 0, 8) == 'upgrade/')) {
			$upgrade = false;
		}

		if ($upgrade) {
			$this->response->redirect($this->url->link('upgrade/upgrade'));
		}
	}
}