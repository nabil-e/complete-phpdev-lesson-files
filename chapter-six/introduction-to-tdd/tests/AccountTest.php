<?php

use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    protected $account;
    protected $user;

    
    protected function setUp(): void
    {
        $this->account = new App\Account();
        $this->user = new App\User();
    }

    /** @test */
    public function an_account_number_can_be_set()
    {

        // Do something
        $this->account->setAccountNumber(1);

        // Make assertions
        $this->assertSame(1, $this->account->getAccountNumber());
    }


    /** @test */
    public function an_account_can_be_related_to_a_user()
    {

        // A user
        $accountHolder = $this->user;

        // Do something

        $this->account->setAccountHolder($accountHolder);

        // Make Assertions

        $this->assertSame($accountHolder, $this->account->getAccountHolder());
    }


    /** @test */
    public function an_account_can_be_hydrated_on_creation()
    {
        // Setup

        $accountNumber = 1234;

        // Do something

        $account = new App\Account(['accountHolder' => $this->user, 'accountNumber' => $accountNumber]);

        // Make assertions
        $this->assertSame($this->user, $account->getAccountHolder());
        $this->assertSame($accountNumber, $account->getAccountNumber());
    }

    /** @test */
    public function an_account_can_be_set_after_creation()
    {
        // Setup

        $accountNumber = 1234;

        // Do something

        $this->account->setProperty(['accountHolder' => $this->user, 'accountNumber' => $accountNumber]);

        // Make assertions
        $this->assertSame($this->user, $this->account->getAccountHolder());
        $this->assertSame($accountNumber, $this->account->getAccountNumber());
    }












}