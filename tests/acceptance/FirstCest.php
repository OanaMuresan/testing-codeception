<?php
use \Codeception\Util\Locator;
class FirstCest
{
  public function frontPageHasSearchForm(AcceptanceTester $I)
  {
    $I->amOnPage('/');
    $I->canSeeElement('form');
    $formAction = $I->grabAttributeFrom('form', 'action');
    $I->assertEquals( $formAction, '/search/search' );
  }

  public function hugeTextDoesntCrash(AcceptanceTester $I)
  {
    $I->amOnPage('/');
    $I->submitForm('form', array('sQuery' => str_repeat('qwerty', 10000)) );
    $I->seeElement('body');
    $I->seeElement('[type=search]');
    $I->seeElement('.item-list');
  }

  public function searchForLasVegasHasResults(AcceptanceTester $I)
  {
    $I->amOnPage('/');
    $I->submitForm('form', array('sQuery' => 'Las Vegas') );
    $I->seeElement('.item-list h3');
  }
}