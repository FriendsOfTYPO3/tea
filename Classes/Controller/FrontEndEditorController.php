<?php

declare(strict_types=1);

namespace TTN\Tea\Controller;

use Psr\Http\Message\ResponseInterface;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for a CRUD FE editor for teas.
 */
class FrontEndEditorController extends ActionController
{
    private TeaRepository $teaRepository;

    public function injectTeaRepository(TeaRepository $teaRepository): void
    {
        $this->teaRepository = $teaRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $userUid = GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('frontend.user', 'id');
        if ($userUid > 0) {
            $this->view->assign('teas', $this->teaRepository->findByOwnerUid($userUid));
        }

        return $this->htmlResponse();
    }
}
