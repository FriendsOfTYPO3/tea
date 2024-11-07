<?php

namespace TTN\Tea\Controller;

use TTN\Tea\Domain\Model\Tea;
use TTN\Tea\Domain\Repository\TeaRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class RatingController extends ActionController
{

    public function __construct(protected TeaRepository $teaRepository)
    {
    }

    public function ratingAction(Tea $tea, int $stars)
    {
        $tea->setStars($stars);
        $this->teaRepository->update($tea);

        return $this->redirect('index','FrontEndEditor');
    }

    public function filterAction(int $stars)
    {
        $this->view->assign('teas', $this->teaRepository->findByStars($stars));
        return $this->htmlResponse();
    }

}
