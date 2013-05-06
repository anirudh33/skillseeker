<?php
require_once './models/csvModel.php';
echo "<pre>";
print_r($_FILES);



    if($_FILES['questionbank']['type'] == "text/csv")
    {
    	echo "hi";
        
        if(isset($_FILES['questionbank']) && $_FILES['questionbank']['size'] > 0)
        {
        
                    $fileName = $_FILES['questionbank']['name'];
                    $tmpName  = $_FILES['questionbank']['tmp_name'];
                    $fileSize = $_FILES['questionbank']['size'];
                    $fileType = $_FILES['questionbank']['type'];
                    $chk_ext = explode(",",$fileName);
                     
                    $handle = fopen($tmpName, "r");
                     
                    if(!$handle){
                        die ('Cannot open file for reading');
                    }
                    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
                        $num = count($data);
                        echo $num;
                        //echo "<p> $num fields in line $row: <br /></p>\n";
                        $row++;
                        for ($c=0; $c < $num; $c++) {
                        echo $data[$c] . "<br />\n";
                        }
                        if($num!=8) {
                           
                           
                           
                        }
                        else {
                            $upload->setQuestionName($data[0]);
                            $upload->setQuessetid($nQuesSetId);
                            $upload->setOption( array ($data[1],$data[2],$data[3],$data[4],$data[5]) );
                            $upload->setAnswer($data[6]);
                            $upload->setType($data[7]);
                            
                           
                        }
        }
        
    }
    }

?>