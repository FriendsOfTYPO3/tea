<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Controller;

use Nimut\TestingFramework\TestCase\UnitTestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\ProphecySubjectInterface;
use TTN\Tea\Controller\TeaController;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\View\TemplateView;

/**
 * @covers \TTN\Tea\Controller\TeaController
 */
class TeaControllerTest extends UnitTestCase
{
    /**
     * @var TeaController
     */
    private $subject = null;

    /**
     * @var TemplateView|ObjectProphecy
     */
    private $viewProphecy = null;

    /**
     * @var TeaRepository|ObjectProphecy
     */
    private $teaRepositoryProphecy = null;

    protected function setUp(): void
    {
        $this->subject = new TeaController();

        $this->viewProphecy = $this->prophesize(TemplateView::class);
        $view = $this->viewProphecy->reveal();
        $this->inject($this->subject, 'view', $view);

        $this->teaRepositoryProphecy = $this->prophesize(TeaRepository::class);
        /** @var TeaRepository|ProphecySubjectInterface $teaRepository */
        $teaRepository = $this->teaRepositoryProphecy->reveal();
        $this->subject->injectTeaRepository($teaRepository);
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
        $this->teaRepositoryProphecy->findAll()->willReturn($teas);
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
