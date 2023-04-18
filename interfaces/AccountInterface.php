<?php
namespace interfaces;

use DateTime;

interface AccountInterface
{
    public function getName(): string;

    public function getNumber(): string;

    public function getBalance(): float;

    public function getTransactions(): array;

    public function deposit(float $amount, string $comment, DateTime $dueDate): void;

    public function withdraw(float $amount, string $comment, DateTime $dueDate): void;

    public function transfer(float $amount, string $comment, DateTime $dueDate, AccountInterface $toAccount): void;
}