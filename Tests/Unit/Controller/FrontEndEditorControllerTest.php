<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TTN\Tea\Controller\FrontEndEditorController;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Context\UserAspect;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\View\TemplateView;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Controller\FrontEndEditorController
 */
final class FrontEndEditorControllerTest extends UnitTestCase
{
    protected bool $resetSingletonInstances = true;

    /**
     * @var FrontEndEditorController&MockObject&AccessibleObjectInterface
     */
    private FrontEndEditorController $subject;

    /**
     * @var TemplateView&MockObject
     */
    private TemplateView $viewMock;

    /**
     * @var TeaRepository&MockObject
     */
    private TeaRepository $teaRepositoryMock;

    private Context $context;

    protected function setUp(): void
    {
        parent::setUp();

        $this->teaRepositoryMock = $this->getMockBuilder(TeaRepository::class)->disableOriginalConstructor()->getMock();

        // We need to create an accessible mock in order to be able to set the protected `view`.
        $methodsToMock = ['htmlResponse', 'redirect', 'redirectToUri'];
        if ((new Typo3Version())->getMajorVersion() <= 11) {
            $methodsToMock[] = 'forward';
        }
        $this->subject = $this->getAccessibleMock(
            FrontEndEditorController::class,
            $methodsToMock,
            [$this->teaRepositoryMock]
        );

        $this->viewMock = $this->createMock(TemplateView::class);
        $this->subject->_set('view', $this->viewMock);

        $responseMock = $this->createMock(HtmlResponse::class);
        $this->subject->method('htmlResponse')->willReturn($responseMock);

        $this->context = new Context();
        GeneralUtility::setSingletonInstance(Context::class, $this->context);
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
    public function indexActionForNoLoggedInUserAssignsNothingToView(): void
    {
        $userAspect = $this->createMock(UserAspect::class);
        $userAspect->expects(self::once())->method('get')->with('id')->willReturn(0);
        $this->context->setAspect('frontend.user', $userAspect);

        $this->viewMock->expects(self::never())->method('assign');

        $this->subject->indexAction();
    }

    /**
     * @test
     */
    public function indexActionForLoggedInUserAssignsTeasOwnedByTheLoggedInUserToView(): void
    {
        $userUid = 5;
        $userAspect = $this->createMock(UserAspect::class);
        $userAspect->expects(self::once())->method('get')->with('id')->willReturn($userUid);
        $this->context->setAspect('frontend.user', $userAspect);

        $teas = $this->createMock(QueryResultInterface::class);
        $this->teaRepositoryMock->method('findByOwnerUid')->with($userUid)->willReturn($teas);
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
}
