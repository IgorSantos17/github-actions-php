<?php

use Codeception\Util\HttpCode as responseValidate;

class ValidatorCPFTestCest
{

    public function tryValidateCpfWithError(ApiTester $I)
    {
        $I->wantTo('test validate cpf, with error');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('cpf', [
            'cpf'=>'000.000.000-00'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);

        $I->seeResponseContains('{"status":"Not Valid"}');
    }

    public function tryValidateCpfWithSuccess(ApiTester $I)
    {
        $I->wantTo('test validate cpf, with success');

        $I->haveHttpHeader('content-type', 'application/json');

        $I->sendPOST('cpf', [
            'cpf'=>'301.270.580-52'
        ]);

        $I->seeResponseIsJson();

        $I->seeResponseCodeIs(200);

        $I->seeResponseContains('{"status":"Valid","cpf":"301.270.580-52"}');
    }
}
