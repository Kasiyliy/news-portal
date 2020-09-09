<?php

namespace Tests\Feature;

use App\Services\Common\V1\Support\CodeService;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    protected $codeService;
    protected $fileService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->codeService = $this->app->make(CodeService::class);
        $this->fileService = $this->app->make(FileService::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */


    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Code service tested well
     */
    public function testCodeService()
    {
        $number = "123321";
        $this->codeService->generateCode($number);
        $value = $this->codeService->getCode($number);
        $this->assertNotNull($value);
        $this->assertTrue($this->codeService->checkCode($number, $value));
        $value = $this->codeService->getCode($number);
        $this->assertNull($value);
    }

    public function testFileService()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');
        $appFile = $this->fileService->putFile($file);
        $this->assertNotNull($appFile);
        $system_url = $appFile->system_url;
        $response = $this->get($system_url);
        $response->assertStatus(200);
        $this->fileService->removeFile($appFile);
        $appFile = $this->fileService->getFile($appFile->filename);
        $this->assertNull($appFile);
        $response = $this->get($system_url);
        $response->assertStatus(404);
    }

}
