<?php
namespace OliverKlee\Tea\Utility;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * This class provides functions concerning files.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class FileUtility
{
    /**
     * Concatenates the files given as $sourceFilePaths and writes their contents into $targetFilePath.
     *
     * @param string   $targetFilePath
     * @param string[] $sourceFilePaths
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function concatenate($targetFilePath, array $sourceFilePaths)
    {
        if ($targetFilePath === '') {
            throw new \InvalidArgumentException('$targetFileName must not be empty.', 1445631384);
        }

        $concatenatedContents = '';
        foreach ($sourceFilePaths as $sourceFilePath) {
            $concatenatedContents .= file_get_contents($sourceFilePath);
        }

        file_put_contents($targetFilePath, $concatenatedContents);
    }
}
