<?php
declare(strict_types=1);

namespace OliverKlee\Tea\Controller;

use OliverKlee\Tea\Domain\Model\Product\Tea;
use OliverKlee\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for the main "Tea" FE plugin.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de
 */
class TeaController extends ActionController
{
    /**
     * @var TeaRepository
     */
    private $teaRepository = null;

    public function injectTeaRepository(TeaRepository $teaRepository): void
    {
        $this->teaRepository = $teaRepository;
    }

    public function indexAction(): void
    {
        $this->view->assign('teas', $this->teaRepository->findAll());
    }

    public function showAction(Tea $tea): void
    {
        $this->view->assign('tea', $tea);
    }
}
