<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config->getFinder()->in('Classes')->in('Configuration')->in('Tests');
return $config;
