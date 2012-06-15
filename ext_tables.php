<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'List',
	'Todo List'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Todos');

t3lib_extMgm::addLLrefForTCAdescr('tx_busynoggintodos_domain_model_todo', 'EXT:busynoggin_todos/Resources/Private/Language/locallang_csh_tx_busynoggintodos_domain_model_todo.xlf');
t3lib_extMgm::allowTableOnStandardPages('tx_busynoggintodos_domain_model_todo');
$TCA['tx_busynoggintodos_domain_model_todo'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:busynoggin_todos/Resources/Private/Language/locallang_db.xlf:tx_busynoggintodos_domain_model_todo',
		'label' => 'description',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
					'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Todo.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_busynoggintodos_domain_model_todo.gif'
	),
);

?>