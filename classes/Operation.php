<?php

namespace classes;

use DateTime;
use interfaces\AccountInterface;

class Operation
{
    const DEPOSIT = 'Deposit';
    const WITHDRAWAL = 'Withdrawal';
    const TRANSFER = 'Transfer';

    private array $accounts;
    private array $transactions;

    public function __construct(array $accounts)
    {
        $this->accounts = $accounts;
        $this->transactions = [];
    }

    public function getAllAccounts(): array
    {
        return $this->accounts;
    }

    public function getAccountBalance(AccountInterface $account): float
    {
        return $account->getBalance();
    }

    public function performTransaction(float $amount, string $comment, DateTime $dueDate, AccountInterface $fromAccount, AccountInterface $toAccount = null): void
    {
        $transactionType = $toAccount ? self::TRANSFER : ($amount > 0 ? self::DEPOSIT : self::WITHDRAWAL);

        switch ($transactionType) {
            case self::DEPOSIT:
                $fromAccount->deposit(abs($amount), $comment, $dueDate);
                break;
            case self::WITHDRAWAL:
                $fromAccount->withdraw(abs($amount), $comment, $dueDate);
                break;
            case self::TRANSFER:
                $fromAccount->transfer(abs($amount), $comment, $dueDate, $toAccount);
                break;
        }

        $this->transactions[] = new Transaction($amount, $comment, $dueDate, $transactionType, $toAccount);
    }

    public function getAllAccountTransactionsSortedByComment(): array
    {
        $allTransactions = [];

        foreach ($this->accounts as $account) {
            $allTransactions = array_merge($allTransactions, $account->getTransactions());
        }

        usort($allTransactions, function (Transaction $a, Transaction $b) {
            return strcmp($a->getComment(), $b->getComment());
        });

        return $allTransactions;
    }

    public function getAllAccountTransactionsSortedByDate(): array
    {
        $allTransactions = [];

        foreach ($this->accounts as $account) {
            $allTransactions = array_merge($allTransactions, $account->getTransactions());
        }

        usort($allTransactions, function (Transaction $a, Transaction $b) {
            return $a->getDueDate() <=> $b->getDueDate();
        });

        return $allTransactions;
    }
}