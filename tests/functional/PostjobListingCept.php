<?php
$I = new FunctionalTester($scenario);

$I->am('guest');
$I->wantTo('post a job listing');

$I->amOnPage('/jobs/create');

$I->fillField('Title', 'This is a title');
$I->fillField('Description', 'This is a description.');
$I->click('Submit');

$I->seeInDatabase('jobs', [
	'title'       => 'This is a title',
	'description' => 'This is a description.',
]);