<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MapViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <script>
                    var mapData = <?php print($this->do->json_data); ?>;
                </script>
                <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/leaflet/leaflet.js"></script>
                <script type="text/javascript" src="<?php print(RequestHelper::$common_url_root); ?>/js/map.js"></script>

                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

				<div id="map"></div>
                <div id="map_log">
                    <h2>Latitude and Longitude coordinates of map cliks</h2>
                </div>
                <br clear="all" />
			<?php
		}

    }

?>