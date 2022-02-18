<?php

namespace ContractualObligations\Tests\Unit;

use ContractualObligations\DBModel;
use PHPUnit\Framework\TestCase;

class DBModelTest extends TestCase
{
    /** @test */
    public function it_serializes_just_the_id_of_the_record()
    {
        $model = DBModel::byId(42);

        $this->assertEquals([
            'id' => '42',
            'name' => 'Colin'
        ], $model->toArray());

        $expected = 'O:30:"ContractualObligations\DBModel":1:{s:2:"id";i:42;}';
        $this->assertEquals($expected, serialize($model));
    }

    /** @test */
    public function it_hydrates_models_when_unserializing()
    {
        $serialized = 'O:30:"ContractualObligations\DBModel":1:{s:2:"id";i:42;}';
        $model = unserialize($serialized);

        $this->assertEquals([
            'id' => '42',
            'name' => 'Colin'
        ], $model->toArray());
    }

    /** @test */
    public function it_serializes_the_whole_model_to_json()
    {
        $model = DBModel::byId(1337);

        $expected = '{"id":1337,"name":"Angela"}';
        $this->assertEquals($expected, json_encode($model));
    }
}
