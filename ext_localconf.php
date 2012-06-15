<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'List',
	array(
		'Todo' => 'index, new, create, edit, update, delete',

	),
	// non-cacheable actions
	array(
		'Todo' => 'create, update, delete',

	)
);

?>