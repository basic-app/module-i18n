<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin.menu', 'Add Translation')];

?>
<form method="POST" id="admin-translation-create-form">

	<?php echo PHPTheme::widget('card', [
		'header' => $title,
		'content' => app_view('BasicApp\I18n\Admin\Translation\_form', [
			'model' => $model,
			'errors' => $errors
		])
	]);?>

</form>