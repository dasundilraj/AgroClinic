<?php

if(isset($_POST['optionsRadios'])){
   // echo "You have selected :".$_POST['optionsRadios'];  //  Displaying Selected Value

    if($_POST['optionsRadios']=="disease_info"){
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");

        // Defines the name of the export file "codelution-export.xls"
        header("Content-Disposition: attachment; filename=AgroClinicDiseaseInformation.xls");

        // Add data table
        include 'excel_disease_information.php';
    }
    else if($_POST['optionsRadios']=="feedback_info"){
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");

        // Defines the name of the export file "codelution-export.xls"
        header("Content-Disposition: attachment; filename=AgroClinicFeedbackInformation.xls");

        // Add data table
        include 'excel_feedback.php';
    }
    else{
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");

        // Defines the name of the export file "codelution-export.xls"
        header("Content-Disposition: attachment; filename=AgroClinicUploadedInformation.xls");

        // Add data table
        include 'excel_user_data.php';
    }
}



?>