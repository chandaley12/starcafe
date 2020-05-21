<?php
/*
$uploadBase = './uploads/';

foreach ($_FILES['upload']['name'] as $f => $name) {   

    $name = $_FILES['upload']['name'][$f];
    $uploadName = explode('.', $name);

    // $fileSize = $_FILES['upload']['size'][$f];
    // $fileType = $_FILES['upload']['type'][$f];
    $uploadname = time().$f.'.'.$uploadName[1];
    $uploadFile = $uploadBase.$uploadname;

    if(move_uploaded_file($_FILES['upload']['tmp_name'][$f], $uploadFile)){
        echo 'success';
    }else{
        echo 'error';
    }
}  

print_r($_FILES['upload']) // 확인용
*/
print_r($_FILES);


/*
Array ( 
    [upload] => Array ( 
            [name] => Array ( [0] => 견적.PNG ) 
            [type] => Array ( [0] => image/png ) 
            [tmp_name] => Array ( [0] => /tmp/phpsjRwRV ) 
            [error] => Array ( [0] => 0 ) 
            [size] => Array ( [0] => 329243 ) 
        )
)
*/
/*
Array ( 
    [upload] => Array ( 
            [name] => Array ( 
                    [0] => 1.PNG 
                    [1] => 2.PNG 
                    [2] => 견적.PNG 
                )
            [type] => Array ( 
                    [0] => image/png 
                    [1] => image/png 
                    [2] => image/png 
                )
            [tmp_name] => Array ( 
                    [0] => /tmp/php12vfK1 
                    [1] => /tmp/phpmHaz6o 
                    [2] => /tmp/php1D5mbR 
                )
            [error] => Array ( 
                    [0] => 0 
                    [1] => 0 
                    [2] => 0 
                )
            [size] => Array ( 
                    [0] => 9153 
                    [1] => 11285 
                    [2] => 329243 
                )
        )
)
*/
?>