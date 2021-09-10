<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Functional\Controller;

use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;

/**
 * @covers \TTN\Tea\Controller\TeaController
 */
class TeaControllerTest extends FunctionalTestCase
{
    /**
     * @var string[]
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/tea'];

    /**
     * @var string[]
     */
    protected $coreExtensionsToLoad = ['fluid_styled_content'];

    protected function setUp(): void
    {
        parent::setUp();

        $this->importDataSet(__DIR__ . '/Fixtures/Database/pages.xml');
        $this->importDataSet(__DIR__ . '/../Domain/Repository/Fixtures/Product/Tea.xml');

        $this->setUpFrontendRootPage(
            1,
            [
                'EXT:fluid_styled_content/Configuration/TypoScript/setup.'
                . ($this->isTYPO3VersionAbove10() ? 'typoscript' : 'txt'),
                'EXT:tea/Configuration/TypoScript/setup.typoscript',
                'EXT:tea/Tests/Functional/Controller/Fixtures/Frontend/Basic.typoscript',
            ]
        );
    }

    /**
     * @test
     */
    public function indexActionRendersTeaTitle(): void
    {
        $responseContent = $this->getFrontendResponse(1)->getContent();

        $teaTitle = 'Earl Grey';
        self::assertContains($teaTitle, $responseContent);
    }

    /**
     * @return bool
     */
    protected function isTYPO3VersionAbove10(): bool
    {
        return VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 10000000;
    }
}
