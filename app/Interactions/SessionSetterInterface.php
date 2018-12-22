<?php

namespace App\Interactions;

interface SessionSetterInterface
{
    public function set($data): void;
}