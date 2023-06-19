<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TTN\Tea\Controller\TeaController;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\View\TemplateView;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Controller\TeaController
 */
final class TeaControllerTest extends UnitTestCase
{
    /**
     * @var TeaController&MockObject&AccessibleObjectInterface
     */
    private TeaController $subject;

    /**
     * @var TemplateView&MockObject
     */
    private TemplateView $viewMock;

    /**
     * @var TeaRepository&MockObject
     */
    private TeaRepository $teaRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        // We need to create an accessible mock in order to be able to set the protected `view`.
        $methodsToMock = ['redirectToUri', 'htmlResponse'];
        if ((new Typo3Version())->getMajorVersion() <= 11) {
            $methodsToMock = array_merge($methodsToMock, ['forward', 'redirect']);
        }
        $this->subject = $this->getAccessibleMock(
            TeaController::class,
            $methodsToMock
        );

        $this->viewMock = $this->createMock(TemplateView::class);
        $this->subject->_set('view', $this->viewMock);

        $this->teaRepositoryMock = $this->getMockBuilder(TeaRepository::class)->disableOriginalConstructor()->getMock();
        $this->subject->injectTeaRepository($this->teaRepositoryMock);

        $responseMock = $this->createMock(HtmlResponse::class);
        $this->subject->method('htmlResponse')->willReturn($responseMock);
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
        $teas = $this->createMock(QueryResultInterface::class);
        $this->teaRepositoryMock->method('findAll')->willReturn($teas);
        $this->viewMock->expects(self::once())->method('assign')->with('teas', $teas);

        $this->subject->indexAction();
    }

    /**
     * @test
     */
    public function indexActionReturnsHtmlResponse(): void
    {
        $result = $this->subject->indexAction();

        self::assertInstanceOf(HtmlResponse::class, $result);
    }

    /**
     * @test
     */
    public function showActionAssignsPassedTeaAsTeaToView(): void
    {
        $tea = new Tea();
        $this->viewMock->expects(self::once())->method('assign')->with('tea', $tea);

        $this->subject->showAction($tea);
    }

    /**
     * @test
     */
    public function showActionAssignsReturnsHtmlResponse(): void
    {
        $result = $this->subject->showAction(new Tea());

        self::assertInstanceOf(HtmlResponse::class, $result);
    }
}
