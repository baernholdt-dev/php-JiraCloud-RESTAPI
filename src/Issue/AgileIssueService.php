<?php

namespace JiraCloud\Issue;

use JiraCloud\AgileApiTrait;
use JiraCloud\Configuration\ConfigurationInterface;
use Psr\Log\LoggerInterface;

class AgileIssueService extends \JiraCloud\JiraClient
{
    use AgileApiTrait;

    private $uri = '/issue';

    public function __construct(ConfigurationInterface $configuration = null, LoggerInterface $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        $this->setupAPIUri();
    }

    public function get($issueIdOrKey, $paramArray = []): ?AgileIssue
    {
        $response = $this->exec($this->uri.'/'.$issueIdOrKey.$this->toHttpQueryParameter($paramArray), null);

        try {
            return $this->json_mapper->map(
                json_decode($response, false, 512, $this->getJsonOptions()),
                new AgileIssue()
            );
        } catch (\JsonException $exception) {
            $this->log->error("Response cannot be decoded from json\nException: {$exception->getMessage()}");

            return null;
        }
    }
}
