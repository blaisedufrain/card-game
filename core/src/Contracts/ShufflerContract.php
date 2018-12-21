<?php

namespace Core\Contracts;

interface ShufflerContract
{
    public function shuffle(array &$deck): void;
}