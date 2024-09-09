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
                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

				<div id="map"></div>
                <div id="map_log">
                    <h2>Events</h2>
                </div>
                <br clear="all" />
			<?php
		}

    }

?>