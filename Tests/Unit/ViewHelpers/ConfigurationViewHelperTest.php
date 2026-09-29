<?php

declare(strict_types=1);

namespace StudioMitte\FriendlyCaptcha\Tests\Unit\ViewHelpers;

use PHPUnit\Framework\Attributes\Test;
use StudioMitte\FriendlyCaptcha\ConfigurationInterface;
use StudioMitte\FriendlyCaptcha\ViewHelpers\ConfigurationViewHelper;
use TYPO3\TestingFramework\Core\BaseTestCase;

class ConfigurationViewHelperTest extends BaseTestCase
{
    #[Test]
    public function viewHelperReturnsProperConfiguration(): void
    {
        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration->method('getSiteKey')->willReturn('1234');
        $configuration->method('getVerifyUrl')->willReturn('https://verify,https://verify2');
        $configuration->method('useEuPuzzleEndpoint')->willReturn(false);
        $configuration->method('getJsPath')->willReturn('EXT:friendlycaptcha_official/Resources/Public/JavaScript/lib/sdk@0.1.26-site.compat.min.js');
        $configuration->method('isEnabled')->willReturn(true);
        $configurationViewHelper = new ConfigurationViewHelper($configuration);

        self::assertSame([
            'siteKey' => '1234',
            'verifyUrl' => 'https://verify,https://verify2',
            'useEuPuzzleEndpoint' => false,
            'jsPath' => 'EXT:friendlycaptcha_official/Resources/Public/JavaScript/lib/sdk@0.1.26-site.compat.min.js',
            'enabled' => true,
        ], $configurationViewHelper->render());
    }
}
