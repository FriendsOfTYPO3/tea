<?php

declare(strict_types=1);

namespace TTN\Tea\Controller;

use Psr\Http\Message\ResponseInterface;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for the main "Tea" FE plugin.
 */
class TeaController extends ActionController
{
    private TeaRepository $teaRepository;

    public function injectTeaRepository(TeaRepository $teaRepository): void
    {
        $this->teaRepository = $teaRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('teas', $this->teaRepository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(Tea $tea): ResponseInterface
    {
        $this->view->assign('tea', $tea);
        return $this->htmlResponse();
    }
}
