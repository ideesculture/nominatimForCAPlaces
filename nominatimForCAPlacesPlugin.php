<?php
/* ----------------------------------------------------------------------
 * This plugin : nominatimForCAPlacesPlugin, created by Idéesculture
 *
 * Author : Gautier Michelin, 2019
 *
 * License : GNU GPL v3.
 * ----------------------------------------------------------------------
 */

class nominatimForCAPlacesPlugin extends BaseApplicationPlugin {
    protected $description = 'Nominatim plugin for CollectiveAccess';
    # -------------------------------------------------------
    private $opo_config;
    private $ops_plugin_path;
    # -------------------------------------------------------
    public function __construct($ps_plugin_path) {
        $this->ops_plugin_path = $ps_plugin_path;
        $this->description = _t('Nominatim plugin for CollectiveAccess');
        parent::__construct();
        $this->opo_config = Configuration::load($ps_plugin_path.'/conf/nominatimForCAPlaces.conf');
    }
    # -------------------------------------------------------
    /**
     * Override checkStatus() to return true - the statisticsViewerPlugin always initializes ok... (part to complete)
     */
    public function checkStatus() {
        return array(
            'description' => $this->getDescription(),
            'errors' => array(),
            'warnings' => array(),
            'available' => 1
        );
    }
    # -------------------------------------------------------
    /**
     * Insert activity menu
     */
    public function hookRenderMenuBar($pa_menu_bar) {
        if ($o_req = $this->getRequest()) {
            //if (!$o_req->user->canDoAction('can_use_media_import_plugin')) { return true; }

            if (isset($pa_menu_bar['nominatimForCAPlacesPlugin_menu'])) {
                $va_menu_items = $pa_menu_bar['nominatimForCAPlacesPlugin_menu']['navigation'];
                if (!is_array($va_menu_items)) { $va_menu_items = array(); }
            } else {
                $va_menu_items = array();
            }

            $pa_menu_bar['nominatimForCAPlacesPlugin_menu_menu'] = array(
                'displayName' => _t('nominatim'),
                'navigation' => [
                    ['displayName' => _t($value),
                        "default" => array(
                            'module' => 'nominatimForCAPlaces',
                            'controller' => 'UpdatePlaceHierarchy',
                            'action' => 'Index'
                        )]
                ]
            );
        }

        return $pa_menu_bar;
    }
    # -------------------------------------------------------
    /**
     * Add plugin user actions
     */
    static function getRoleActionList() {
        return array();
    }
}