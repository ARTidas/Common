<?php

    /* ********************************************************
	 * *** Models *********************************************
	 * ********************************************************/

        /* ********************************************************
         * *** Business Objects ***********************************
         * ********************************************************/
        require(RequestHelper::$common_file_root . '/models/bos/mariadb_database_connection_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/abstract_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/user_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/password_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/security_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/user_profile_image_file_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/map_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/map_pin_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/permission_bo.php');
        require(RequestHelper::$common_file_root . '/models/bos/user_permission_bo.php');

        /* ********************************************************
         * *** Data Access Objects ********************************
         * ********************************************************/
        require(RequestHelper::$common_file_root . '/models/daos/abstract_dao.php');
        require(RequestHelper::$common_file_root . '/models/daos/user_dao.php');
        require(RequestHelper::$common_file_root . '/models/daos/map_dao.php');
        require(RequestHelper::$common_file_root . '/models/daos/map_pin_dao.php');
        require(RequestHelper::$common_file_root . '/models/daos/permission_dao.php');
        require(RequestHelper::$common_file_root . '/models/daos/user_permission_dao.php');

        /* ********************************************************
         * *** Data Objects ***************************************
         * ********************************************************/
        require(RequestHelper::$common_file_root . '/models/dos/view_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/trivia_view_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/user_permission_view_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/abstract_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/user_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/map_pin_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/dormitory_map_pin_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/permission_do.php');
        require(RequestHelper::$common_file_root . '/models/dos/user_permission_do.php');

        /* ********************************************************
         * *** Helpers ********************************************
         * ********************************************************/
        require(RequestHelper::$common_file_root . '/models/helpers/log_helper.php');
        require(RequestHelper::$common_file_root . '/models/helpers/actor_helper.php'); //TODO: Do we need this?
        require(RequestHelper::$common_file_root . '/models/helpers/string_helper.php');
        require(RequestHelper::$common_file_root . '/models/helpers/datetime_helper.php');
        require(RequestHelper::$common_file_root . '/models/helpers/permission_helper.php');

        /* ********************************************************
         * *** Factories ******************************************
         * ********************************************************/
        require(RequestHelper::$common_file_root . '/models/factories/bo_factory.php');
        require(RequestHelper::$common_file_root . '/models/factories/dao_factory.php');
        require(RequestHelper::$common_file_root . '/models/factories/do_factory.php');


    /* ********************************************************
	 * *** Views **********************************************
	 * ********************************************************/
    require(RequestHelper::$common_file_root . '/views/abstract_view.php');
    require(RequestHelper::$common_file_root . '/views/project_abstract_view.php');
    require(RequestHelper::$common_file_root . '/views/index_view.php');
    require(RequestHelper::$common_file_root . '/views/user_list_view.php');
    require(RequestHelper::$common_file_root . '/views/user_create_view.php');
    require(RequestHelper::$common_file_root . '/views/user_login_view.php');
    require(RequestHelper::$common_file_root . '/views/user_profile_view_view.php');
    require(RequestHelper::$common_file_root . '/views/user_birthday_calendar_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_useful_links_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_pti_lectures_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_linux_commands_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_python_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_database_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_robotics_view_view.php');
    require(RequestHelper::$common_file_root . '/views/knowledge_center_digital_logic_view_view.php');
    require(RequestHelper::$common_file_root . '/views/trivia_view_view.php');
    require(RequestHelper::$common_file_root . '/views/map_view_view.php');
    require(RequestHelper::$common_file_root . '/views/map_pin_create_view.php');
    require(RequestHelper::$common_file_root . '/views/map_pin_list_view.php');
    require(RequestHelper::$common_file_root . '/views/map_pin_modify_view.php');
    require(RequestHelper::$common_file_root . '/views/dormitory_map_view_view.php');
    require(RequestHelper::$common_file_root . '/views/permission_create_view.php');
    require(RequestHelper::$common_file_root . '/views/permission_list_view.php');
    require(RequestHelper::$common_file_root . '/views/permission_modify_view.php');
    require(RequestHelper::$common_file_root . '/views/user_permission_request_view.php');
    require(RequestHelper::$common_file_root . '/views/user_permission_review_view.php')

?>