<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TTN\Tea\Controller\FrontEndEditorController;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Context\UserAspect;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\View\TemplateView;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Controller\FrontEndEditorController
 */
final class FrontEndEditorControllerTest extends UnitTestCase
{
    /**
     * @var FrontEndEditorController&MockObject&AccessibleObjectInterface
     */
    private FrontEndEditorController $subject;

    /**
     * @var TemplateView&MockObject
     */
    private TemplateView $viewMock;

    private Context $context;

    /**
     * @var TeaRepository&MockObject
     */
    private TeaRepository $teaRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->context = new Context();
        $this->teaRepositoryMock = $this->createMock(TeaRepository::class);

        // We need to create an accessible mock in order to be able to set the protected `view`.
        $methodsToMock = ['htmlResponse', 'redirect', 'redirectToUri'];
        if ((new Typo3Version())->getMajorVersion() <= 11) {
            $methodsToMock[] = 'forward';
        }
        $this->subject = $this->getAccessibleMock(
            FrontEndEditorController::class,
            $methodsToMock,
            [$this->context, $this->teaRepositoryMock]
        );

        $this->viewMock = $this->createMock(TemplateView::class);
        $this->subject->_set('view', $this->viewMock);

        $responseStub = $this->createStub(HtmlResponse::class);
        $this->subject->method('htmlResponse')->willReturn($responseStub);
    }

    /**
     * @param int<0, max> $userUid
     */
    private function setUidOfLoggedInUser(int $userUid): void
    {
        $userAspectMock = $this->createMock(UserAspect::class);
        $userAspectMock->method('get')->with('id')->willReturn($userUid);
        $this->context->setAspect('frontend.user', $userAspectMock);
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
        $this->setUidOfLoggedInUser(0);

        $this->viewMock->expects(self::never())->method('assign');

        $this->subject->indexAction();
    }

    /**
     * @test
     */
    public function indexActionForLoggedInUserAssignsTeasOwnedByTheLoggedInUserToView(): void
    {
        $userUid = 5;
        $this->setUidOfLoggedInUser($userUid);

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

    /**
     * @test
     */
    public function editActionWithOwnTeaAssignsProvidedTeaToView(): void
    {
        $userUid = 5;
        $this->setUidOfLoggedInUser($userUid);
        $tea = new Tea();
        $tea->setOwnerUid($userUid);

        $this->viewMock->expects(self::once())->method('assign')->with('tea', $tea);

        $this->subject->editAction($tea);
    }

    /**
     * @test
     */
    public function editActionWithTeaFromOtherUserThrowsException(): void
    {
        $this->setUidOfLoggedInUser(1);
        $tea = new Tea();
        $tea->setOwnerUid(2);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('You do not have the permissions to edit this tea.');
        $this->expectExceptionCode(1687363749);

        $this->subject->editAction($tea);
    }

    /**
     * @test
     */
    public function editActionWithTeaWithoutOwnerThrowsException(): void
    {
        $this->setUidOfLoggedInUser(1);
        $tea = new Tea();
        $tea->setOwnerUid(0);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('You do not have the permissions to edit this tea.');
        $this->expectExceptionCode(1687363749);

        $this->subject->editAction($tea);
    }

    /**
     * @test
     */
    public function editActionForOwnTeaReturnsHtmlResponse(): void
    {
        $userUid = 5;
        $this->setUidOfLoggedInUser($userUid);
        $tea = new Tea();
        $tea->setOwnerUid($userUid);

        $result = $this->subject->editAction($tea);

        self::assertInstanceOf(HtmlResponse::class, $result);
    }

    /**
     * @test
     */
    public function updateActionWithOwnTeaPersistsProvidedTea(): void
    {
        $userUid = 5;
        $this->setUidOfLoggedInUser($userUid);
        $tea = new Tea();
        $tea->setOwnerUid($userUid);
        $this->mockRedirect('index');

        $this->teaRepositoryMock->expects(self::once())->method('update')->with($tea);

        $this->subject->updateAction($tea);
    }

    private function mockRedirect(string $actionName): void
    {
        if ((new Typo3Version())->getMajorVersion() <= 11) {
            $this->subject->expects(self::once())->method('redirect')
                ->with($actionName)
                // @phpstan-ignore-next-line This class does not exist in V12 anymore, but this branch is V11-only.
                ->willThrowException(new StopActionException('redirectToUri', 1476045828));
            // @phpstan-ignore-next-line This class does not exist in V12 anymore, but this branch is V11-only.
            $this->expectException(StopActionException::class);
        } else {
            $redirectResponse = $this->createStub(RedirectResponse::class);
            $this->subject->expects(self::once())->method('redirect')->with($actionName)
                ->willReturn($redirectResponse);
        }
    }

    /**
     * @test
     */
    public function updateActionWithOwnTeaRedirectsToIndexAction(): void
    {
        $userUid = 5;
        $this->setUidOfLoggedInUser($userUid);
        $tea = new Tea();
        $tea->setOwnerUid($userUid);

        $this->mockRedirect('index');

        $this->subject->updateAction($tea);
    }

    /**
     * @test
     */
    public function updateActionWithTeaFromOtherUserThrowsException(): void
    {
        $this->setUidOfLoggedInUser(1);
        $tea = new Tea();
        $tea->setOwnerUid(2);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('You do not have the permissions to edit this tea.');
        $this->expectExceptionCode(1687363749);

        $this->subject->updateAction($tea);
    }

    /**
     * @test
     */
    public function updateActionWithTeaWithoutOwnerThrowsException(): void
    {
        $this->setUidOfLoggedInUser(1);
        $tea = new Tea();
        $tea->setOwnerUid(0);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('You do not have the permissions to edit this tea.');
        $this->expectExceptionCode(1687363749);

        $this->subject->updateAction($tea);
    }
}
