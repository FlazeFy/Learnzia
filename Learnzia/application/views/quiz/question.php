<style>
    input[type=radio] {
        width: 18px;
        height: 18px;
    }
    .quiz-nav{
        border: 2px solid #f1c40f;
        width: 120px;
        color: #F1c40f;
    }
    .quiz-nav:hover{
        background: #f1c40f;
        color: #212121;
    }
</style>

<?php 
    //Initial variable.
	$i = 1; 
	$count = 0;
    $total = count($quizNav);

	foreach($currentQuestion as $quiz){	
        $id_qas ="";
        echo"
        <div id='accordion-quiz' class='accordion'>
            <div class='card p-1 my-3 border-0 rounded' style='background-color:#212121;'>
                <div class='card-header' id='headingOne'>
                    <form action='quizCtrl/answer' method='POST'>"; 
                        if($quiz['question_url'] != "null"){
                            echo"
                            <img src='http://localhost/Learnzia/assets/uploads/quiz/".$quiz['question_url'].".jpg'  
                                data-toggle='modal' data-target='#zoom".$quiz['id_quiz']."' style='width:80%; height:80%;' 
                                class='d-block mx-auto'>
                            <div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>";
                        }
                        echo
                        "<p class='text-white'>".$quiz['question_body']."</p>
                        <h5>Answer: </h5>";
                        //Intial variable.
                        $no = 1;
                        $id_qq ="";
                        $id_qas ="";
                        $slct_opt ="";

                        //Check if there's an option has been selected.
                        foreach($currentAnswer as $ans){	
                            $slct_opt = $ans['quiz_opt'];
                            $id_qq = $ans['id_qq'];
                            $id_qas = $ans['id_qas'];
                        }

                        for($no = 1; $no <= 4; $no++){
                            $status = "";
                            if($quiz['question_opt_'.$no] != "null"){
                                if(($quiz['id_qq'] == $id_qq)&&($no == $slct_opt)){
                                    $status = "checked";
                                    echo "<input hidden name='id_qas' value='".$id_qas."'>";
                                }       
                                echo"
                                <li class='input-group mt-2'>
                                    <div class='input-group-prepend'>
                                        <div class='input-group-text bg-transparent p-2 border-0'>
                                            <input ".$status." type='radio' name='opt' value='".$no."' style='background:red !important;'>
                                        </div>
                                    </div>
                                    <a class='text-white text-decoration-none'>".$quiz['question_opt_'.$no]."</a>
                                </li>";
                            }
                        }
                        echo"
                        <input hidden name='id_qas' value='".$id_qas."'>
                        <div class='mt-3 position-relative'>
                            <h5 class='text-primary text-center position-absolute b-0' style='left:50%;'>".$quiz['quiz_no']."</h5>";
                            if($quiz['quiz_no'] != 1){
                                echo"
                                <button class='btn btn-transparent quiz-nav float-left' value='prev' name='route_quiz' type='submit'>
                                <i class='fa-solid fa-arrow-left'></i> Previous</button>";
                            }
                            if($quiz['quiz_no'] != $total){
                                echo"
                                <button class='btn btn-transparent quiz-nav float-right' value='next' name='route_quiz' type='submit'>
                                    Next <i class='fa-solid fa-arrow-right'></i></button>";
                            } else {
                                echo"
                                <a class='btn btn-success float-right' style='width: 120px;'><i class='fa-solid fa-check'></i> Finish</a>";
                            }
                            echo "
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
    }
?>