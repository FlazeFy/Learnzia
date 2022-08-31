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
	$i = 1; 
	$count = 0;
	foreach($currentQuestion as $quiz){	
		echo"
		<div id='accordion-quiz' class='accordion'>
			<div class='card p-1 my-3 border-0 rounded' style='background-color:#212121;'>
                <div class='card-header' id='headingOne'>
                    <form action='quizCtrl/answer' method='POST'>";
                        if($quiz['question_url'] != "null"){
                            echo"
                            <img src='http://localhost/Learnzia/assets/uploads/quiz/".$data['question_url'].".jpg' id='question_img' 
                                data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
                            <div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>";
                        }
                        echo
                        "<p class='text-white'>".$quiz['question_body']."</p>
                        <h5>Answer: </h5>";
                        $no = 1;
                        while($no <= 4){
                            echo"
                            <li class='input-group mt-2'>
                                <div class='input-group-prepend'>
                                    <div class='input-group-text bg-transparent p-2 border-0'>
                                        <input type='radio' name='opt' value='".$no."' style='background:red !important;'>
                                    </div>
                                </div>
                                <a class='text-white text-decoration-none'>".$quiz['question_opt_'.$no]."</a>
                            </li>";
                            $no++;
                        }
                        echo"
                        <div class='mt-3 position-relative'>
                            <h5 class='text-primary text-center position-absolute b-0' style='left:50%;'>".$quiz['quiz_no']."</h5>";
                            if($quiz['quiz_no'] != 1){
                                echo"
                                <button class='btn btn-transparent quiz-nav float-left' type='submit'>
                                <i class='fa-solid fa-arrow-left'></i> Previous</button>";
                            }
                            echo"
                            <button class='btn btn-transparent quiz-nav float-right' type='submit'>
                                Next <i class='fa-solid fa-arrow-right'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
    }
?>