<style>
    .btn-nav{
        background: #202020;
        color: #f1c40f;
        width: 40px;
        height: 40px;
    }
    .btn-nav.active{
        background: #f1c40f;
        color: #202020;
    }
    .btn-nav:hover{
        color: #f1c40f;
        border: 2px solid #f1c40f !important; 
    }
</style>

<div class='row'>
    <?php 
        $i = 1; 
        $count = 0;
        foreach($allQQuestion as $quiz){
            $status = "";
            if($this->session->userdata('quiz_numberTrack') == $quiz['quiz_no']){
                $status = "active";
            } 
            echo "
            <form action='quizCtrl/answer' method='POST'>
                <div class='col-lg-2 col-md-3 col-sm-1 m-1'>
                    <input name='quiz_no' value='".$quiz['quiz_no']."' hidden>
                    <button value='none' name='route_quiz' class='btn btn-transparent btn-nav ".$status." border-0' type='submit'>".$quiz['quiz_no']."</button>
                </div>
            </form>";
        }
    ?>      
</div>