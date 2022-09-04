<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\ProphecySubjectInterface;
use TTN\Tea\Controller\TeaController;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TTN\Tea\Service\TeaInformationService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\View\TemplateView;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Controller\TeaController
 */
class TeaControllerTest extends UnitTestCase
{
    /**
     * @var TeaController&MockObject&AccessibleObjectInterface
     */
    private $subject;

    /**
     * @var ObjectProphecy<TemplateView>
     */
    private $viewProphecy;

    /**
     * @var ObjectProphecy<TeaRepository>
     */
    private $teaRepositoryProphecy;

    /**
     * @var ObjectProphecy<TeaInformationService>
     */
    private $teaInformationServiceProphecy;

    protected function setUp(): void
    {
        parent::setUp();

        // We need to create an accessible mock in order to be able to set the protected `view`.
        $this->subject = $this->getAccessibleMock(TeaController::class, ['redirect', 'forward']);

        $this->viewProphecy = $this->prophesize(TemplateView::class);
        $view = $this->viewProphecy->reveal();
        $this->subject->_set('view', $view);

        $this->teaRepositoryProphecy = $this->prophesize(TeaRepository::class);
        /** @var TeaRepository&ProphecySubjectInterface $teaRepository */
        $teaRepository = $this->teaRepositoryProphecy->reveal();
        $this->subject->injectTeaRepository($teaRepository);

        $this->teaInformationServiceProphecy = $this->prophesize(TeaInformationService::class);
        /** @var TeaInformationService&ProphecySubjectInterface $teaInformationService */
        $teaInformationService = $this->teaInformationServiceProphecy->reveal();
        $teaRepository->injectTeaInformationService($teaInformationService);
    }

    /**
     * @test
     */
    public function isActionController(): void
    {
        self::assertInstanceOf(ActionController::class, $this->subject);
    }

    /**
     * @test
     */
    public function indexActionAssignsAllTeaAsTeasToView(): void
    {
        $teas = $this->prophesize(QueryResultInterface::class)->reveal();
        $this->teaRepositoryProphecy->findAllEnriched()->willReturn($teas);
        $this->viewProphecy->assign('teas', $teas)->shouldBeCalled();

        $this->subject->indexAction();
    }

    /**
     * @test
     */
    public function showActionAssignsPassedTeaAsTeaToView(): void
    {
        $tea = new Tea();
        $this->viewProphecy->assign('tea', $tea)->shouldBeCalled();

        $this->subject->showAction($tea);
    }
}
