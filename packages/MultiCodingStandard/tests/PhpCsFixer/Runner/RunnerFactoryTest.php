<?php declare(strict_types=1);

namespace Symplify\MultiCodingStandard\PhpCsFixer\Runner;

use PhpCsFixer\Runner\Runner;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Symplify\MultiCodingStandard\Tests\ContainerFactory;

final class RunnerFactoryTest extends TestCase
{
    /**
     * @var RunnerFactory
     */
    private $runnerFactory;

    protected function setUp()
    {
        $container = (new ContainerFactory())->create();
        $this->runnerFactory = $container->getByType(RunnerFactory::class);
    }

    public function test()
    {
        $runner = $this->runnerFactory->create(['@Symfony'], [], __DIR__);
        $this->assertInstanceOf(Runner::class, $runner);
        $this->assertCount(91, Assert::getObjectAttribute($runner, 'fixers'));
    }
}
