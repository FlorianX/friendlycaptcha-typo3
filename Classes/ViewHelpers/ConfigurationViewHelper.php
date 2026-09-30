<?php

declare(strict_types=1);

namespace StudioMitte\FriendlyCaptcha\ViewHelpers;

use StudioMitte\FriendlyCaptcha\ConfigurationInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ConfigurationViewHelper extends AbstractViewHelper
{
    public function __construct(private readonly ConfigurationInterface $configuration) {}

    public function render(): array
    {
        return [
            'siteKey' => $this->configuration->getSiteKey(),
            'verifyUrl' => $this->configuration->getVerifyUrl(),
            'useEuPuzzleEndpoint' => $this->configuration->useEuPuzzleEndpoint(),
            'jsPath' => $this->configuration->getJsPath(),
            'enabled' => $this->configuration->isEnabled(),
        ];
    }
}
