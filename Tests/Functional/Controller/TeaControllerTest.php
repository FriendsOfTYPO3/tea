<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Functional\Controller;

use TYPO3\TestingFramework\Core\Functional\Framework\Frontend\InternalRequest;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \TTN\Tea\Controller\TeaController
 */
final class TeaControllerTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['ttn/tea'];

    protected array $coreExtensionsToLoad = ['typo3/cms-fluid-styled-content'];

    protected array $pathsToLinkInTestInstance = [
        'typo3conf/ext/tea/Tests/Functional/Controller/Fixtures/Sites/' => 'typo3conf/sites',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->importCSVDataSet(__DIR__ . '/Fixtures/Database/SiteStructure.csv');
        $this->setUpFrontendRootPage(1, [
            'setup' => [
                'EXT:fluid_styled_content/Configuration/TypoScript/setup.typoscript',
                'EXT:tea/Tests/Functional/Controller/Fixtures/TypoScript/Rendering.typoscript',
            ],
        ]);
    }

    /**
     * @test
     */
    public function indexActionRendersAllAvailableTeas(): void
    {
        $this->importCSVDataSet(__DIR__ . '/Fixtures/Database/ContentElementTeaIndex.csv');
        $this->importCSVDataSet(__DIR__ . '/Fixtures/Database/Teas.csv');

        $request = new InternalRequest();
        $request = $request->withPageId(1);

        $html = $this->executeFrontendSubRequest($request)->getBody()->__toString();

        self::assertStringContainsString('Godesberger Burgtee', $html);
        self::assertStringContainsString('Oolong', $html);
    }
}
