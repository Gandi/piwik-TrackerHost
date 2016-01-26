<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\TrackerHost;

use Piwik\Settings\SystemSetting;
use Piwik\Settings\UserSetting;

/**
 * Defines Settings for TrackerHost.
 *
 * Usage like this:
 * $settings = new Settings('TrackerHost');
 * $settings->autoRefresh->getValue();
 * $settings->metric->getValue();
 */
class Settings extends \Piwik\Plugin\Settings
{
    /** @var SystemSetting */
    public $trackerhost;

    protected function init()
    {
        $this->setIntroduction('Here you can specify the settings for this plugin.');

        $this->createTrackerhostSetting();

    }

    private function createTrackerhostSetting()
    {
        $this->trackerhost = new SystemSetting('trackerhost', 'Hostname used by the Tracker.');
        $this->trackerhost->readableByCurrentUser = true;
        $this->trackerhost->uiControlType = static::CONTROL_TEXT;
        $this->trackerhost->description   = 'This hostname will be used in the sample tracker code displayed when there is no data yet.';
        $this->trackerhost->defaultValue  = "";

        $this->addSetting($this->trackerhost);
    }
}
