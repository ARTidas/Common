<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class DormitoryMapViewView extends ProjectAbstractView {

        

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <script>
                    var mapData = <?php print($this->do->json_data); ?>;
                </script>
                <script src="https://rawgit.com/mapbox/leaflet-image/gh-pages/leaflet-image.js"></script>
                <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/leaflet/leaflet.js"></script>
                <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/dormitory_map.js"></script>

                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

				<div id="map"></div>

                <!-- Save canvas -->
                <br clear="all" />
                <button id="save_leaflet_map">Save Map as Image</button>

			<?php
		}

    }

?>