<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config->getFinder()->in('Classes');
return $config;
