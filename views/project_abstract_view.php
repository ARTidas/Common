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
                                <a href="<?php print(RequestHelper::$url_root); ?>/knowledge_center_pti_lectures/view">PTI Lectures</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/knowledge_center_linux_commands/view">Linux commands</a>
                            </div>
                        </div>

                        <!-- <div>
                            <a href="<?php print(RequestHelper::$url_root); ?>/bulletin_board/view">Bulletin board</a>
                        </div> -->

                        <!-- <div>
                            <button>Resources</button>
                            <div>
                                <a href="<?php print(RequestHelper::$url_root); ?>/resource/list">List</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/resource/request">Request</a>
                            </div>
                        </div> -->

                        <div>
                            <button>Map</button>
                            <div>
                                <a href="<?php print(RequestHelper::$url_root); ?>/map/view">View</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/map_pin/create">Create pin</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/map_pin/list">List pins</a>
                                <a href="<?php print(RequestHelper::$url_root); ?>/map_pin/modify">Modify pin</a>
                            </div>
                        </div>

                    </nav>
                </section>

                
			<?php
		}

    }

?>