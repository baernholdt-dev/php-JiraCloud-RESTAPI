<?php

namespace JiraCloud\Issue;

class IssueStatus implements \JsonSerializable
{
    /* @var string */
    public $self;

    /* @var string */
    public $id;

    /* @var string|null */
    public $description;

    /* @var string */
    public $iconUrl;

    /* @var string */
    public $name;

    /* @var \JiraCloud\Issue\Statuscategory */
    public $statuscategory;

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
