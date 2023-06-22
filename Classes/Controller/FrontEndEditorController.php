<?php

declare(strict_types=1);

namespace TTN\Tea\Controller;

use Psr\Http\Message\ResponseInterface;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for a CRUD FE editor for teas.
 */
class FrontEndEditorController extends ActionController
{
    private Context $context;

    private TeaRepository $teaRepository;

    public function __construct(Context $context, TeaRepository $teaRepository)
    {
        $this->context = $context;
        $this->teaRepository = $teaRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $userUid = $this->getUidOfLoggedInUser();
        if ($userUid > 0) {
            $this->view->assign('teas', $this->teaRepository->findByOwnerUid($userUid));
        }

        return $this->htmlResponse();
    }

    /**
     * @return int<0, max>
     */
    private function getUidOfLoggedInUser(): int
    {
        return $this->context->getPropertyFromAspect('frontend.user', 'id');
    }

    public function editAction(Tea $tea): ResponseInterface
    {
        $this->checkIfUserIsOwner($tea);

        $this->view->assign('tea', $tea);

        return $this->htmlResponse();
    }

    /**
     * @throws \RuntimeException
     */
    private function checkIfUserIsOwner(Tea $tea): void
    {
        if ($tea->getOwnerUid() !== $this->getUidOfLoggedInUser()) {
            throw new \RuntimeException('You do not have the permissions to edit this tea.', 1687363749);
        }
    }

    public function updateAction(Tea $tea): ResponseInterface
    {
        $this->checkIfUserIsOwner($tea);

        $this->teaRepository->update($tea);

        return $this->redirect('index');
    }
}
