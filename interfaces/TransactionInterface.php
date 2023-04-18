<?php

namespace interfaces;

use DateTime;

interface TransactionInterface
{
    public function __construct(float $amount, string $comment, DateTime $dueDate, string $type, ?AccountInterface $toAccount = null);

    public function getAmount(): float;

    public function getComment(): string;

    public function getDueDate(): DateTime;

    public function getType(): string;

    public function getToAccount(): ?AccountInterface;
}