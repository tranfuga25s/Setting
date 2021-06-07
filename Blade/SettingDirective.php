<?php

namespace Modules\Setting\Blade;

final class SettingDirective
{
    /**
     * @var string
     */
    private $settingName;
    /**
     * @var string
     */
    private $locale;
    /**
     * @var string Default value
     */
    private $default;

    /**
     * @param $arguments
     */
    public function show($arguments)
    {
        $this->extractArguments($arguments);

        return e(setting($this->settingName, $this->locale, $this->default));
    }

    /**
     * @param array $arguments
     */
    private function extractArguments(array $arguments)
    {
        $this->settingName = array_get($arguments, 0);
        $this->locale = array_get($arguments, 1);
        $this->default = array_get($arguments, 2);
    }

    public function has(array $arguments)
    {
      $this->extractArguments($arguments);
      return hasSetting($this->settingName, $this->locale);
    }

    public function hasMultiple(array $settings, $locale = null)
    {
      $this->locale = $locale;
      $condition = false;
      foreach ($settings as $setting) {
        $condition = $condition && hasSetting($setting, $locale);
      }
      return $condition;
    }
}
