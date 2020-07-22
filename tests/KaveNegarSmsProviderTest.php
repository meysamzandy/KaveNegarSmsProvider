<?php

namespace MeysamZnd\KaveNegarSmsProvider\Tests;

use MeysamZnd\KaveNegarSmsProvider\CallMessage;
use MeysamZnd\KaveNegarSmsProvider\Facades\KaveNegarSmsProvider;
use MeysamZnd\KaveNegarSmsProvider\ServiceProvider;
use MeysamZnd\KaveNegarSmsProvider\ToMany;
use MeysamZnd\KaveNegarSmsProvider\ToOne;
use MeysamZnd\KaveNegarSmsProvider\Validation;
use Mockery;

class KaveNegarSmsProviderTest extends \PHPUnit\Framework\TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'kave-negar-sms-provider' => KaveNegarSmsProvider::class,
        ];
    }

    public function testSend()
    {
        $dataTrue = ['send' => [
            'status' => true,
            'providerResult' => [
                'return' => [
                    'status' => 200,
                    'message' => "تایید شد",
                ],
                'entries' => [
                    'messageid' => 1330504453,
                    'message' => 'fake text',
                    'status' => 5,
                    'statustext' => 'ارسال به مخابرات',
                    'sender' => 'fake',
                    'receptor' => 'fake',
                    'date' => 1595421048,
                    'cost' => 370,
                ],
            ],
        ]];

        $dataFalse = ['send' => [
            'status' => false,
            'providerResult' => 'fake message',
        ]];

        // test ToOne::class
        /**********************************/
        Mockery::close();
        $mock = Mockery::mock('overload:' . ToOne::class, $dataTrue);
        self::assertInstanceOf(ToOne::class, $mock);

        $aliKey = 'fake api jey';
        $data = [
            'receptor' => 'fake',
            'sender' => 'fake',
            'message' => 'fake',
            'date' => 'fake',
        ];
        $sender = new ToOne();
        $result = $sender->send($aliKey, $data);

        self::assertTrue($result['status']);
        self::assertArrayHasKey('return', $result['providerResult']);
        self::assertArrayHasKey('entries', $result['providerResult']);
        self::assertEquals(200, $result['providerResult']['return']['status']);
        Mockery::close();


        $mock1 = Mockery::mock('overload:' . ToOne::class, $dataFalse)->makePartial();
        self::assertInstanceOf(ToOne::class, $mock1);
        //         false if variable has doesnt value
        $sender1 = (new ToOne())->send('', []);

        self::assertFalse($sender1['status']);
        self::assertIsNotArray($sender1['providerResult']);
        Mockery::close();
        /***************************************/

        // test ToMany::class
        /**********************************/
        Mockery::close();
        $mock = Mockery::mock('overload:' . ToMany::class, $dataTrue);
        self::assertInstanceOf(ToMany::class, $mock);

        $aliKey = 'fake api jey';
        $data = [
            'receptor' => 'fake',
            'sender' => 'fake',
            'message' => 'fake',
            'date' => 'fake',
        ];
        $sender = new ToMany();
        $result = $sender->send($aliKey, $data);

        self::assertTrue($result['status']);
        self::assertArrayHasKey('return', $result['providerResult']);
        self::assertArrayHasKey('entries', $result['providerResult']);
        self::assertEquals(200, $result['providerResult']['return']['status']);
        Mockery::close();


        $mock1 = Mockery::mock('overload:' . ToMany::class, $dataFalse)->makePartial();
        self::assertInstanceOf(ToMany::class, $mock1);
        //         false if variable has doesnt value
        $sender1 = (new ToMany())->send('', []);

        self::assertFalse($sender1['status']);
        self::assertIsNotArray($sender1['providerResult']);
        Mockery::close();
        /***************************************/

        // test CallMessage::class
        /**********************************/
        Mockery::close();
        $mock = Mockery::mock('overload:' . CallMessage::class, $dataTrue);
        self::assertInstanceOf(CallMessage::class, $mock);

        $aliKey = 'fake api jey';
        $data = [
            'receptor' => 'fake',
            'sender' => 'fake',
            'message' => 'fake',
            'date' => 'fake',
        ];
        $sender = new CallMessage();
        $result = $sender->send($aliKey, $data);

        self::assertTrue($result['status']);
        self::assertArrayHasKey('return', $result['providerResult']);
        self::assertArrayHasKey('entries', $result['providerResult']);
        self::assertEquals(200, $result['providerResult']['return']['status']);
        Mockery::close();


        $mock1 = Mockery::mock('overload:' . CallMessage::class, $dataFalse)->makePartial();
        self::assertInstanceOf(CallMessage::class, $mock1);
        //         false if variable has doesnt value
        $sender1 = (new CallMessage())->send('', []);

        self::assertFalse($sender1['status']);
        self::assertIsNotArray($sender1['providerResult']);
        Mockery::close();
        /***************************************/

        // test Validation::class
        /**********************************/
        Mockery::close();
        $mock = Mockery::mock('overload:' . Validation::class, $dataTrue);
        self::assertInstanceOf(Validation::class, $mock);

        $aliKey = 'fake api jey';
        $data = [
            'receptor' => 'fake',
            'sender' => 'fake',
            'message' => 'fake',
            'date' => 'fake',
        ];
        $sender = new Validation();
        $result = $sender->send($aliKey, $data);

        self::assertTrue($result['status']);
        self::assertArrayHasKey('return', $result['providerResult']);
        self::assertArrayHasKey('entries', $result['providerResult']);
        self::assertEquals(200, $result['providerResult']['return']['status']);
        Mockery::close();


        $mock1 = Mockery::mock('overload:' . Validation::class, $dataFalse)->makePartial();
        self::assertInstanceOf(Validation::class, $mock1);
        //         false if variable has doesnt value
        $sender1 = (new Validation())->send('', []);

        self::assertFalse($sender1['status']);
        self::assertIsNotArray($sender1['providerResult']);
        Mockery::close();
        /***************************************/
    }
}
