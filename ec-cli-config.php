<?php

declare(strict_types=1);

use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder
    ->in(__DIR__)
    ->notPath('tools')
    ->notPath('.Build')
    ->notPath('var')
    ->notPath('Documentation-GENERATED-temp')
    ->notName('phpstan-baseline.neon')
;

return $finder;
