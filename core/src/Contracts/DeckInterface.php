<?php

namespace Core\Contracts;

interface DeckInterface
{
    public function getAllCards(): array ;

    public function setCards(): void;

    public static function getSuits(): array;

    public static function getValues(): array;
}