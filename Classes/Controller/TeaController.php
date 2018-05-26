<?php
declare(strict_types = 1);
namespace OliverKlee\Tea\Controller;

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

    /**
     * @param TeaRepository $teaRepository
     *
     * @return void
     */
    public function injectTeaRepository(TeaRepository $teaRepository)
    {
        $this->teaRepository = $teaRepository;
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('teas', $this->teaRepository->findAll());
    }
}
