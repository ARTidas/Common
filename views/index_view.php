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
                    <li>I18N...</li>
                    <li>Make PHP mail function work</li>
                    <li>Issue/Bug/Error reporter</li>
                    <li>Implement a password mask for increased security</li>
                    <li>Send email verification upon registration</li>
                    <li>Create a forgotten password process</li>
                </ol>

                <h2>Q&A</h2>
                <ol>
                    <li>Should emails be restricted to the unithe.hu emails only?</li>
                </ol>
			<?php
		}

    }

?>