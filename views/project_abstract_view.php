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
                <!-- <div class="box">
                    <?php
                        print(RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action);
                    ?>
                </div> -->

				<section id="menu">
                    <nav>
                        <a href="<?php print(RequestHelper::$url_root); ?>">Main</a>
                        <a href="<?php print(RequestHelper::$url_domain); ?>">PTI Main</a>

                        <div>
                            <button>User</button>
                            <div>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user/list">List</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user/create">Register</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user/login">Login</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user_profile/view">Profile</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user_birthday_calendar/view">Birthday calendar</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/user/logout">Logout</a>
                            </div>
                        </div>

                        <div>
                            <button>Knowledge center</button>
                            <div>
                            <a href="<?php print(RequestHelper::$url_root); ?>/knowledge_center_useful_link/view">Useful links</a>
                            </div>
                        </div>

                    </nav>
                </section>

                
			<?php
		}

    }

?>