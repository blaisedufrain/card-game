<?php

namespace App\Interactions;

interface SessionResolverInterface
{
    public function keyExists(): bool;

    public function resolve(): array;
}