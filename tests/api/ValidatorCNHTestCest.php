<?php

use Codeception\Util\HttpCode as responseValidate;

class ValidatorCNHTestCest
{

    public function tryValidateCnhWithError(ApiTester $I)
    {
        $I->wantTo('test validate cnh, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('cnh', [
            'cnh'=>'0000000000'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);

        $I->seeResponseContains('{"status":"Not Valid"}');
    }

    public function tryValidateCnhWithSuccess(ApiTester $I)
    {
        $I->wantTo('test validate cnh, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('cnh', [
            'cnh'=>'24982690022'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);

        $I->seeResponseContains('{"status":"Valid","cnh":"24982690022"}');
    }
}
