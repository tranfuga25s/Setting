<?php namespace Modules\Setting\Tests;

use Modules\Core\Tests\BaseTestCase;

abstract class BaseSettingTest extends BaseTestCase
{
    /**
     * @var \Modules\Setting\Repositories\SettingRepository
     */
    protected $settingRepository;

    public function setUp()
    {
        parent::setUp();

        /** @var \Illuminate\Contracts\Console\Kernel $artisan */
        $artisan = $this->app->make('Illuminate\Contracts\Console\Kernel');
        $artisan->call('module:migrate', ['module' => 'Setting']);

        $this->settingRepository = app('Modules\Setting\Repositories\SettingRepository');
    }
}