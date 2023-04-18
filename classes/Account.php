<?php

namespace classes;

use DateTime;
use interfaces\AccountInterface;

class Account implements AccountInterface
{
    private string $name;
    private string $number;
    private array $transactions;

    public function __construct(string $name, string $number)
    {
        $this->name = $name;
        $this->number = $number;
        $this->transactions = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getBalance(): float
    {
        $balance = 0;
        foreach ($this->transactions as $transaction) {
            $balance += $transaction->getAmount();
        }
        return $balance;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function deposit(float $amount, string $comment, DateTime $dueDate): void
    {
        $transaction = new Transaction($amount, $comment, $dueDate, Operation::DEPOSIT);
        $this->transactions[] = $transaction;
    }

    public function withdraw(float $amount, string $comment, DateTime $dueDate): void
    {
        $transaction = new Transaction(-$amount, $comment, $dueDate, Operation::WITHDRAWAL);
        $this->transactions[] = $transaction;
    }

    public function transfer(float $amount, string $comment, DateTime $dueDate, AccountInterface $toAccount): void
    {
        $transaction = new Transaction(-$amount, $comment, $dueDate, Operation::TRANSFER, $toAccount);
        $this->transactions[] = $transaction;
        $toAccount->deposit($amount, $comment, $dueDate);
    }
}