<?php

declare(strict_types=1);

namespace TTN\Tea\Service;

use TTN\Tea\Domain\Model\Product\Tea;

/**
 * Service to load default tea information
 */
class TeaInformationService
{
    /**
     * @var array
     */
    private $teaInformation = [
        'Black tea' => '<p>Black tea is generally stronger in flavour than other teas. </p>',
        'Oolong tea' => '<p>Oolong is a traditional semi-oxidized Chinese tea. </p>',
        'Green tea' => '<p>Green tea is a type of tea that is made from <i>Camellia sinensis</i> leaves and buds'
                        . ' that have not undergone the same withering and oxidation process used to make oolong'
                        . ' teas and black teas. </p>',
        'Fermented tea' => '<p>Fermented tea is a class of tea that has undergone microbial fermentation, from'
                        . ' several months to many years. The most famous fermented tea is pu\'er produced in'
                        . ' Yunnan province.</p>',
    ];

    public function updateDefaultTeaDescription(Tea $tea): void
    {
        $tea->setDefaultDescription($this->getTeaInformation($tea));
    }

    private function getTeaInformation(Tea $tea): string
    {
        $information = '';
        foreach ($this->teaInformation as $key => $value) {
            if (strtolower($key) === strtolower($tea->getTitle())) {
                $information = $value;
            }
        }
        return $information;
    }
}
