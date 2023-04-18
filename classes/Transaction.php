<?php

namespace classes;

use DateTime;
use interfaces\AccountInterface;
use interfaces\TransactionInterface;

class Transaction implements TransactionInterface
{
    private float $amount;
    private string $comment;
    private DateTime $dueDate;
    private string $type;
    private ?Account $toAccount;

    public function __construct(float $amount, string $comment, DateTime $dueDate, string $type, ?AccountInterface $toAccount = null)
    {
        $this->amount = $amount;
        $this->comment = $comment;
        $this->dueDate = $dueDate;
        $this->type = $type;
        $this->toAccount = $toAccount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getToAccount(): ?AccountInterface
    {
        return $this->toAccount;
    }
}