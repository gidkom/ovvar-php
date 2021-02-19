<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Gidkom\Ovvar\Voucher;

class VoucherTest extends TestCase
{
    public function setUp(): void
    {
        // replace with valid key
        $apiKey = 'cP0OsCgO.aXIKpPR8awO5FWwaNBbakiNAEemGCFKG';
        $this->voucher = new Voucher($apiKey);
    }

    public function testGenerateVoucher()
    {
        $res = $this->voucher->generate([
            'currency' => 'USD',
            'value' => 5.0,
            'channel' => 'email',
            'recipient_email' => 'xyz@domain.com',
            'quantity' => 1.0
        ]);

        $this->assertTrue($res['status']);
        $this->assertEquals($res['code'], 201);
    }

    public function testValidateWithWrongPin()
    {
        $res = $this->voucher->validate('87654321');
        $this->assertFalse($res['status']);
        $this->assertEquals($res['code'], 400);
    }

    public function testWrongPinRedeemVoucher()
    {
        $res = $this->voucher->redeem('12345678');
        $this->assertFalse($res['status']);
    }
}
