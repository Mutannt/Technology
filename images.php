<?php
function upload_image($input_name, $file_name)
{
    //Функция подгрузки изображения из элемента управления "файл"
    //<input type="file"/>
    //Конфигурация
    //Список расширений файлов, разрешённых к загрузке
    $allowed_ext=Array("png", "jpg", "gif", "bmp");
    //Путь к католог, куда должны быть загружены файлы.$_COOKIE
    $image_path="$_SERVER[DOCUMENT_ROOT]/mysite/images";
    //=======================================================
    //Проверяем не было ли ошибок при загрузке файла
    if($_FILES[$input_name]["error"]==UPLOAD_ERR_OK)
    {
        //В целях безопасности првоеряем, чтоф айл был
        //действительно загружен из формы
        if(is_uploaded_file($_FILES[$input_name]['tmp_name']))
        {
            $ext = substr($_FILES[$input_name]['name'],
            1 + strrpos($_FILES[$input_name]['name'], "."));
            // и проверяем, что оно является допустимым
            // (с расширением именно графического фацлы)
            if(in_array(strtolower($ext), $allowed_ext))
            {
                //перемещаем файл из временной папки в постояннную
                @move_uploaded_file(
                $_FILES[$input_name]['tmp_name'],
                $image_path."/".$file_name.".".$ext);
                //Возврат расширения
                return $ext;
            }
        }
    }
    //Ошибка - возврат пустой строки
    return "";
}
?>