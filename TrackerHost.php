<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\TrackerHost;

class TrackerHost extends \Piwik\Plugin
{

	public function registerEvents()
	{
		return array(
			"Piwik.getJavascriptCode" => "manipulateJavascriptTrackingCode",
			"SitesManager.getImageTrackingCode" => "manipulateImageTrackingCode"
		);
	}

	public function manipulateJavascriptTrackingCode(&$codeReplace, $parameters)
	{
		$settings = new Settings('TrackerHost');
		$host = $settings->trackerhost->getValue();
		if ($host != '') {
			$codeReplace['piwikUrl'] = $host;
			$codeReplace['httpsPiwikUrl'] = $host;
		}
	}

        public function manipulateImageTrackingCode(&$piwikUrl, &$urlParams)
        {
                $settings = new Settings('TrackerHost');
                $host = $settings->trackerhost->getValue();
                if ($host != '') {
                        $piwikUrl = $host;
                }
        }

}
