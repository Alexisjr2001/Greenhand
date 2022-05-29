<?php
function Handle($folder,&$uploadedFiles,&$urlQuery)
{
    foreach($_FILES['multimedia']['error'] as $key=>$error){
        if($error== UPLOAD_ERR_OK){
            $fileName = $_FILES['multimedia']['name']["$key"];
            $fileTmpName = $_FILES['multimedia']['tmp_name']["$key"];
            $fileSize = $_FILES['multimedia']['size']["$key"];
            $fileError = $_FILES['multimedia']['error']["$key"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array("png", "jpeg", "jpg", "mp4");

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 25000000) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $uploadedFiles["$fileName"] = $folder . $fileNameNew;
                        move_uploaded_file($fileTmpName, $uploadedFiles["$fileName"]);
                    } else {
                        $urlQuery['multimedia'] = "too-big";
                        exitPHP($urlQuery);
                    }
                } else {
                    $urlQuery['multimedia'] = "err";
                    exitPHP($urlQuery);
                }
            } else {
                $urlQuery['multimedia'] = "inv-ext";
                exitPHP($urlQuery);
            }
        }
    }
}
