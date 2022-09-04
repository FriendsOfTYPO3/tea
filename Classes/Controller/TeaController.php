<?php

declare(strict_types=1);

namespace TTN\Tea\Controller;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for the main "Tea" FE plugin.
 */
class TeaController extends ActionController
{
    /**
     * @var TeaRepository
     */
    private $teaRepository;

    public function injectTeaRepository(TeaRepository $teaRepository): void
    {
        $this->teaRepository = $teaRepository;
    }

    public function indexAction(): void
    {
        $this->view->assign('teas', $this->teaRepository->findAllEnriched());
    }

    public function showAction(Tea $tea): void
    {
        $this->teaRepository->enrichTea($tea);
        $this->view->assign('tea', $tea);
    }
}
