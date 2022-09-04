<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\ProphecySubjectInterface;
use TTN\Tea\Controller\TeaController;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
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
    use ProphecyTrait;

    /**
     * @var TeaController&MockObject&AccessibleObjectInterface
     */
    private TeaController $subject;

    /**
     * @var ObjectProphecy<TemplateView>
     */
    private ObjectProphecy $viewProphecy;

    /**
     * @var ObjectProphecy<TeaRepository>
     */
    private ObjectProphecy $teaRepositoryProphecy;

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
