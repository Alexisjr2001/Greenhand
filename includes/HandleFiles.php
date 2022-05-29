<?php
function Handle($folder,&$uploadedFiles)
{
    if (!empty($_FILES['multimedia']['name'])) {
        $num = count($_FILES['multimedia']['name']);
        for ($i = 0; $i < $num; $i++) {
            $fileName = $_FILES['multimedia']['name']["$i"];
            $fileTmpName = $_FILES['multimedia']['tmp_name']["$i"];
            $fileSize = $_FILES['multimedia']['size']["$i"];
            $fileError = $_FILES['multimedia']['error']["$i"];

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
