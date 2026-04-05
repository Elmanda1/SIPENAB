<?php

namespace App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class MahasiswaTest extends CIUnitTestCase
{
    use FeatureTestTrait, DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'App';

    public function testCreateMahasiswa()
    {
        $data = [
            'nim'   => '2021001',
            'nama'  => 'John Doe',
            'email' => 'john@example.com'
        ];

        $result = $this->post('mahasiswa', $data);

        $result->assertStatus(201);
        $this->seeInDatabase('mahasiswa', ['nim' => '2021001']);
    }

    public function testCreateMahasiswaValidationError()
    {
        $data = [
            'nim'   => '',
            'nama'  => 'John Doe',
            'email' => 'invalid-email'
        ];

        $result = $this->post('mahasiswa', $data);

        $result->assertStatus(400);
    }
}
