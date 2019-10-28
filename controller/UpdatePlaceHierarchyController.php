<?php
/* ----------------------------------------------------------------------
 * plugins/statisticsViewer/controllers/StatisticsController.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2010 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This source code is free and modifiable under the terms of
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */

require_once(__CA_LIB_DIR__.'/core/Configuration.php');
require_once(__CA_MODELS_DIR__.'/ca_lists.php');
require_once(__CA_MODELS_DIR__.'/ca_objects.php');
require_once(__CA_MODELS_DIR__.'/ca_places.php');
require_once(__CA_MODELS_DIR__.'/ca_locales.php');


class UpdatePlaceHierarchyController extends ActionController {
    # -------------------------------------------------------
    protected $opo_config;        // plugin configuration file
    protected $opa_dir_list;    // list of available import directories


    # -------------------------------------------------------

    public function __construct(&$po_request, &$po_response, $pa_view_paths=null) {
        parent::__construct($po_request, $po_response, $pa_view_paths);

        $this->opo_config = Configuration::load(__CA_APP_DIR__.'/plugins/nominatimForCaPlaces/conf/nominatimForCaPlaces.conf');
    }

    # -------------------------------------------------------
    # Functions to render views
    # -------------------------------------------------------
    public function Index($type="") {
            $this->render('index_html.php');
    }
}