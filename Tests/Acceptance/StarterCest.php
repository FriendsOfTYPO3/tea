<?php
declare(strict_types = 1);
namespace OliverKlee\Tea\Tests\Acceptance;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class StarterCest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    public function seeAuthorName(\AcceptanceTester $I)
    {
        $I->see('Oliver Klee');
    }

    public function canNavigateToPastWorkshops(\AcceptanceTester $I)
    {
        $I->click('Workshops');
        $I->click('Rückblick');
        $I->see('2017 (17)');
    }
}
