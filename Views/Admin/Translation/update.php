<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin', 'Update')];

?>
<form method="POST" id="admin-translation-update-form">

	<?php admin_theme_widget('card', [
		'header' => $title,
		'content' => app_view('BasicApp\I18n\Admin\Translation\_form', [
			'model' => $model,
			'errors' => $errors
		])
	]);?>

</form>