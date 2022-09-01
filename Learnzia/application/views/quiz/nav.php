<style>
    .btn-nav{
        background: #202020;
        color: #f1c40f;
        width: 40px;
        height: 40px;
    }
    .btn-nav.active{
        border: 2px solid #f1c40f !important;
    }
    .btn-nav:hover{
        color: #f1c40f;
        border: 2px solid #f1c40f !important;
    }

    .btn-nav.answered{
        background: #f1c40f;
        color: #202020;
        font-weight: 500;
    }
</style>

<div class='row'>
    <?php 
        $i = 1; 
        $count = 0;
        foreach($quizNav as $quiz){
            //Initial variable
            $status = "";
            $status2 = "";
            
            if($this->session->userdata('quiz_numberTrack') == $quiz['quiz_no']){
                $status = "active";
            } 
            if($quiz['quiz_opt'] != null){
                $status2 = "answered";
            } 
            echo "
            <div class='col-lg-2 col-md-3 col-sm-1 m-1'>
                <form action='quizCtrl/answer' method='POST'>
                    <input name='quiz_no' value='".$quiz['quiz_no']."' hidden>
                    <button value='none' name='route_quiz' class='btn btn-transparent btn-nav ".$status." ".$status2." border-0' type='submit'>";
                        if($quiz['quiz_opt'] != null){
                            if($quiz['quiz_opt'] == 1){
                                echo "A";
                            } else if($quiz['quiz_opt'] == 2){
                                echo "B";
                            } else if($quiz['quiz_opt'] == 3){
                                echo "C";
                            } else if($quiz['quiz_opt'] == 4){
                                echo "D";
                            }
                        } else {
                            echo $quiz['quiz_no'];
                        }
                    echo "
                    </button>
                </form>        
            </div>";
        }
    ?>      
</div>