<?php
	class nominatimForCAPlacesPlugin extends BaseApplicationPlugin {
		# -------------------------------------------------------
		protected $description = ' Nominatim plugin for CollectiveAccess';
		# -------------------------------------------------------
		private $opo_config;
		private $ops_plugin_path;
		# -------------------------------------------------------
		public function __construct($ps_plugin_path) {
			$this->ops_plugin_path = $ps_plugin_path;
			$this->description = _t('Nominatim');
			parent::__construct();
			$this->opo_config = Configuration::load($ps_plugin_path.'/conf/statisticsViewer.conf');
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

				if (isset($pa_menu_bar['nominatim_menu'])) {
					$va_menu_items = $pa_menu_bar['nominatim_menu']['navigation'];
					if (!is_array($va_menu_items)) { $va_menu_items = array(); }
				} else {
					$va_menu_items = array();
				}

				$pa_menu_bar['nominatim_menu'] = array(
					'displayName' => _t('Nominatim'),
					'navigation' => [
					    [
					    'displayName' => "Index",
                        "default" => [
                            'module' => 'nominatimForCAPlaces',
                            'controller' => 'Update',
                            'action' => 'Index'
                            ]
                        ]
                    ]
				);
				//var_dump($pa_menu_bar);die();
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
?>