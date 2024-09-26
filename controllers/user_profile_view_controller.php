<?php

    if (isset($_POST['modify']) && $_POST['modify'] === 'Update') {
        //TODO: Make this abstract!!!
        $do->name                           = $_POST['name'];
        $do->neptun_code                    = $_POST['neptun_code'];
        $do->phone                          = $_POST['phone'];
        $do->birthday_at                    = $_POST['birthday_at'];
        $do->address                        = $_POST['address'];
        $do->tax_number                     = $_POST['tax_number'];
        $do->demonstrator_contract_number   = $_POST['demonstrator_contract_number'];

        LogHelper::addMessage('Modifying record with id: #' . $do->id);

        if ($bo->updateProfile($do)) {
            LogHelper::addConfirmation('Record updated successfully...');
        }
        else {
            LogHelper::addWarning('Modification failed!');
        }

        if (isset($_FILES['image_file'])) {
            if (true) { //TODO: implement checks for the image upload.
                $image_file_bo = new ImageFileBo($_FILES['image_file'], $do);
                
                LogHelper::addMessage('File uploaded successfully!');
            }
            else {
                LogHelper::addMessage('Error occured while uploading file!');
            }
        }
    }

    $view = new (RequestHelper::$actor_class_name . ucfirst(RequestHelper::$actor_action) . 'View')(
        new ViewDo(
            RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            'DESCRIPTION - ' . RequestHelper::$project_name . ' > ' . RequestHelper::$actor_name . ' > ' . RequestHelper::$actor_action,
            null,
            $do //Here comes the user profile do...
        ),
    );

    $view->displayHTMLOpen();
    $view->displayHeader();
    $view->displayMenu();
    $view->displayContent();
    $view->displayFooter();
    $view->displayLogs();
    $view->displayHTMLClose();

?>