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
use TYPO3\CMS\Core\Http\HtmlResponse;
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
        $this->subject = $this->getAccessibleMock(
            TeaController::class,
            ['forward', 'redirect', 'redirectToUri', 'htmlResponse']
        );

        $this->viewProphecy = $this->prophesize(TemplateView::class);
        $view = $this->viewProphecy->reveal();
        $this->subject->_set('view', $view);

        $this->teaRepositoryProphecy = $this->prophesize(TeaRepository::class);
        /** @var TeaRepository&ProphecySubjectInterface $teaRepository */
        $teaRepository = $this->teaRepositoryProphecy->reveal();
        $this->subject->injectTeaRepository($teaRepository);

        $response = $this->prophesize(HtmlResponse::class)->reveal();
        $this->subject->method('htmlResponse')->willReturn($response);
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
        $this->viewProphecy->render()->willReturn('');

        self::assertInstanceOf(
            HtmlResponse::class,
            $this->subject->indexAction()
        );
    }

    /**
     * @test
     */
    public function showActionAssignsPassedTeaAsTeaToView(): void
    {
        $tea = new Tea();
        $this->viewProphecy->assign('tea', $tea)->shouldBeCalled();
        $this->viewProphecy->render()->willReturn('');

        self::assertInstanceOf(
            HtmlResponse::class,
            $this->subject->showAction($tea)
        );
    }


    /**
     * @test
     */
    public function showActionWithOverlongTeaTitleCallsErrorAction(): void
    {
        $tea = new Tea();
        $stringLength256 = 'Lorem ipsum dolor sit amet, consetetur sadipscing '
            .'elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore'
            .' magna aliquyam erat, sed diam voluptua. At vero eos et accusam'
            .' et justo duo dolores et ea rebum. Stet clita kasd gubergren, '
            .'no sea takimata xxx';
        $tea->setTitle($stringLength256);

        self::assertEquals(
            400,
            $this->subject->showAction($tea)->getStatusCode(),
        );
    }
}
