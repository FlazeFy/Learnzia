<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style='background-color:#313436;'>
            <div class="modal-header">
                <h5 class="" style='margin-left:35%;'>Are you sure?...</h5>
            </div>
            <div class="modal-body">
                <table style="width:100%; color:whitesmoke;">
                    <tr>
                        <th>Time Taken</th>
                        <th>Answered</th>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                foreach($allAttempt as $atmpt){
                                    //Get date diff
                                    $date1 = new DateTime($atmpt['created_at']);
                                    $date2 = new DateTime(date('Y-m-d H:i:s'));
                                    $diff = $date2->diff($date1);

                                    //Date condition
                                    if($diff->d > 0){
                                        echo $diff->format('%a day, %h hours, %i minutes, and %s seconds');
                                    } else if(($diff->d == 0)&&($diff->h > 0)){
                                        echo $diff->format('%h hours, %i minutes, and %s seconds');
                                    } else {
                                        echo $diff->format('%i minutes, and %s seconds');
                                    }
                                }   
                            ?>
                        </td>
                        <td>
                            <?php 
                                $i = 0; 
                                foreach($quizNav as $quiz){
                                    if($quiz['quiz_opt'] != null){
                                        $i++;
                                    }
                                } 
                                echo $i;
                            ?> / 
                            <?php echo count($allQQuestion); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <form action="QuizCtrl/submitQuiz" method="POST">
                    <button type="submit" class="btn btn-success">Yes, Submit</button>
                </form>
            </div>			
		</div>
	</div>
</div>	