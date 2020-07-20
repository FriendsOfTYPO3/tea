<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Functional\Controller;

use Nimut\TestingFramework\TestCase\FunctionalTestCase;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
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
                $this->getFluidStyledContentTyposcriptTemplate(),
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
     * @return string
     */
    protected function getFluidStyledContentTyposcriptTemplate(): string
    {
        $typoscriptTemplatePath = 'EXT:fluid_styled_content/Configuration/TypoScript/setup.';

        if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 10000000) {
            $extension = 'typoscript';
        } else {
            $extension = 'txt';
        }

        return $typoscriptTemplatePath . $extension;
    }
}
