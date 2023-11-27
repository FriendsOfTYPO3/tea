<?php

namespace TTN\Tea\Controller;

use Psr\Http\Message\ResponseInterface;
use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;

class RatingController extends FrontEndEditorController
{
    public function ratingAction(Tea $tea, int $stars)
    {
        $this->checkIfUserIsOwner($tea);
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
