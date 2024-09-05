<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class ProjectAbstractView extends AbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayMenu() {
			?>
                <div class="box">
                    <?php
                        print(RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action);
                    ?>
                </div>

				<section id="menu">
                    <nav>
                        <a href="<?php print(RequestHelper::$url_root); ?>">Main</a>
                        <a href="<?php print(RequestHelper::$url_domain); ?>">PTI Main</a>

                        <div>
                            <button>User</button>
                            <div>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user/list">List</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user/create">Create</a>
                                <!-- <a href="<?php print(RequestHelper::$url_root); ?>/task_type/modify">Modify</a> -->
                            </div>
                        </div>

                    </nav>
                </section>

                
			<?php
		}

    }

?>