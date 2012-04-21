<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
#############################################################################################################################
//*/
function ckeditor($textarea_id, $initialValue, $group = '')
	{
		require_once('ckeditor/ckeditor.php');

		// Create a class instance.
		$CKEditor = new CKEditor();

		// Path to the CKEditor directory.
		$CKEditor->basePath = '/ckeditor/';

		// Set global configuration (used by every instance of CKEditor).
		$CKEditor->config['width'] = 600;

		$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);

		//must restrict some of the ckeditor features to non admin users
		if ($group == 'Normal' || $group == 'BM' || $group == 'SM' || $group == 'GoldM')
			{
				$CKEditor->config['toolbar'] = 'Basic';
			}

		// Change default textarea attributes.
		$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);

		return $CKEditor->editor($textarea_id, $initialValue);
	}
//*/
#############################################################################################################################

?>