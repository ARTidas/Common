<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class IndexView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h2>Repositiories</h2>
                <p><a href="https://github.com/ARTidas/Common">https://github.com/ARTidas/Common</a></p>

				<h2>TODO</h2>
                <ol>
                    <li>Make PHP mail function work</li>
                    <li>Get it done...
                        <ol>
                            <li>Without bugs...</li>
                            <li>Preferrably with test cases...</li>
                        </ol>
                    </li>
                </ol>
			<?php
		}

    }

?>