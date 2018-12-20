<?php

namespace Core;

class Card
{
    /**
     * @var string
     */
    public $suit;
    /**
     * @var int
     */
    public $value;
    /**
     * @var null|string
     */
    public $name;

    /**
     * Card constructor.
     * @param string $suit
     * @param int $value
     * @param string|null $name
     */
    public function __construct(string $suit, int $value, string $name = null)
    {
        $this->suit = $suit;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function display(): string
    {
        return $this->getName() . " of $this->suit";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return (string) (is_null($this->name) ? $this->value : $this->name);
    }
}