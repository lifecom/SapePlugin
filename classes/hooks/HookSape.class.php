<?php

class PluginSape_HookSape extends Hook
{

    public function RegisterHook()
    {
	$this->AddHook('template_body_end', 'Sape', __CLASS__);
    }

    public function Sape()
    {
	if (!defined('_SAPE_USER')) {
	    define('_SAPE_USER', '_свой_сапакод_');
	}
	require_once($_SERVER['DOCUMENT_ROOT'] . '/' . _SAPE_USER . '/sape.php');

  $oSape = new SAPE_client();

	$this->Viewer_Assign('sSape',iconv('CP1251','UTF-8',$oSape->return_links(5)));
	return $this->Viewer_Fetch(Plugin::GetTemplatePath('sape') . 'sape.tpl');
    }

}

?>
