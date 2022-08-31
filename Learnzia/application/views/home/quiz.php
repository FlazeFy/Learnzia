<?php 
	$i = 1; 
	$count = 0;
	foreach($allQuiz as $quiz){	
		echo"
		<div id='accordion-quiz' class='accordion'>
			<div class='card p-1 my-3 border-0 rounded' style='background-color:#212121;'>
                <div class='card-header' id='headingOne'>
                    <form action='homeCtrl/playquiz' method='POST'>
                        <input hidden name='id_quiz' value='".$quiz['id_quiz']."'>
                        <img src='http://localhost/Learnzia/assets/uploads/user/".$quiz['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mr-2' style='width:45px; float:left;'>
                        <a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
                        //Discussion header.
                        if($quiz['id_user'] == $this->session->userdata('userIdTrack')){
                            echo"
                            <h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$quiz['created_at']."</span></h5>";
                        } else {
                            echo"
                            <h5 style='font-size:18px;'>".$quiz['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$quiz['created_at']."</span></h5>";
                        } echo "
                        <h5 id='question_cat'>".$quiz['quiz_category']."</h5>
                        <h6 style='color:#F1C40F;'>".$quiz['quiz_title']."</h6>
                        <p style='font-size:14px; color:whitesmoke;'>".$quiz['quiz_desc']."</p>
                        <button type='submit' class='btn btn-success'><i class='fa-solid fa-play'></i> Take Quizes</button>
                        <a class='btn btn-transparent border-0 text-white float-right' data-toggle='modal' data-target='#shareQuiz".$quiz['id_quiz']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
                        <a class='float-right my-2' style='color:#f1c40f; font-weight:bold;'><i class='fa-solid fa-file-circle-check'></i> "; 
                        $count = 0;
                        foreach($allQQuestion as $qq){
                            if($qq['id_quiz'] == $quiz['id_quiz']){
                                $count++;
                            }
                        }
                        echo $count;
                        echo
                        "</a>
                    </form>
                </div>
            </div>
        </div>";
    }
?>