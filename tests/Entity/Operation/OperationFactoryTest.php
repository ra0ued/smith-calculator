<?php declare(strict_types=1);

namespace App\Tests\Entity\Operation;

use App\Entity\Operation\Add;
use App\Entity\Operation\Divide;
use App\Entity\Operation\Multiply;
use App\Entity\Operation\OperationFactory;
use App\Entity\Operation\Subtract;
use App\Exception\OperationNotImplementedException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class OperationFactoryTest extends KernelTestCase
{
    /**
     * @dataProvider operationProvider
     */
    public function testSuccess(string $operation, string $operationObject): void
    {
        self::bootKernel();

        $container = static::getContainer();

        /** @var OperationFactory $operationFactory */
        $operationFactory = $container->get(OperationFactory::class);
        $object = $operationFactory->getOperation($operation);

        $this->assertInstanceOf($operationObject, $object);
    }

    public function operationProvider(): array
    {
        return [
            ['add', Add::class],
            ['divide', Divide::class],
            ['multiply', Multiply::class],
            ['subtract', Subtract::class],
        ];
    }

    public function testException(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        /** @var OperationFactory $operationFactory */
        $operationFactory = $container->get(OperationFactory::class);

        $this->expectException(OperationNotImplementedException::class);
        $this->expectExceptionMessage('Operation of type non existent operation is not implemented yet.');
        $operationFactory->getOperation('non existent operation');
    }
}