<?php

namespace JiraCloud\Auth;

use JiraCloud\ClassSerialize;

class SessionInfo implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $value;

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
