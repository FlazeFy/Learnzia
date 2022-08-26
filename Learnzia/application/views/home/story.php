<style>
    #storyBox{
        background-position: center;
        background-repeat:no-repeat;
        background-size: cover;
        background-color: black;
        display:inline-block;
        height:120px;
    }
    #storyTitle{
        overflow: hidden;
        text-align:left;
        font-size:14px;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        text-decoration:none;
    }
    #story-holder{
        height: 150px;
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
    }
</style>

<div class="container mb-3">			
    <h4>Stories</h4>
    <div id="story-holder">
        <!--Add post-->
        <button class='btn btn-primary border-0 py-3' style='margin-top:-45px; background-color: #00a13e; max-width:120px; max-height:120px;'>
            <img src='http://localhost/Learnzia/assets/uploads/user/<?php foreach($dataUser as $u){ echo $u['imageURL']; }?>.jpg' alt='New Post' class='rounded-circle img-fluid' 
                style='width:60px; height:60px;'>
            <h5 class="mt-2" style='font-size:14px; color:whitesmoke;'>New Stories</h5>
        </button>

        <!--Story list-->
        <?php
            foreach($allStory as $sty){
                if($sty['story_type'] == "image"){
                    echo"
                    <div class='rounded p-2 ms-2 position-relative' id='storyBox'
                        style='width:250px; background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.6)) , url(http://localhost/Learnzia/assets/uploads/story/".$sty['story_url'].".jpg);'>
                        <button type='submit' class='w-100 h-100 border-0 bg-transparent'>";
                            if($sty['story_interact'] == "yes"){
                                echo "
                                <a class='btn btn-transparent border-0 mx-2 position-absolute' data-toggle='modal' data-target='#shareStory".$sty['id_story']."' 
                                    title='forward' style='right:30px; top:0px; color:#f1c40f;'><i class='fa-solid fa-message'></i></a>
                                <a class='btn btn-transparent border-0 mx-2 position-absolute' data-toggle='modal' data-target='#shareStory".$sty['id_story']."' 
                                    title='forward' style='right:0px; top:0px; color:#f1c40f;'><i class='fa-solid fa-paper-plane'></i></a>";
                            }   
                            echo"
                            <img src='http://localhost/Learnzia/assets/uploads/user/".$sty['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid position-absolute shadow' 
                                style='width:35px; left:10px; top:10px;'>
                            <a class='text-white' style='margin-top:40px;' id='storyTitle'>".$sty['story_caption']."</a>
                        </button>
                    </div>";
                } else if($sty['story_type'] == "voting") {
                    echo"
                    <div class='rounded p-2 ms-2 position-relative' id='storyBox'
                        style='width:250px; margin-top:-45px; background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.6)) , url(http://localhost/Learnzia/assets/uploads/story/".$sty['story_url'].".jpg);'>
                        <button type='submit' class='w-100 h-100 border-0 bg-transparent'>";
                            if($sty['story_interact'] == "yes"){
                                echo "
                                <a class='btn btn-transparent border-0 mx-2 position-absolute' data-toggle='modal' data-target='#shareStory".$sty['id_story']."' 
                                    title='forward' style='right:30px; top:0px; color:#f1c40f;'><i class='fa-solid fa-message'></i></a>
                                <a class='btn btn-transparent border-0 mx-2 position-absolute' data-toggle='modal' data-target='#shareStory".$sty['id_story']."' 
                                    title='forward' style='right:0px; top:0px; color:#f1c40f;'><i class='fa-solid fa-paper-plane'></i></a>";
                            }   
                            echo"
                            <img src='http://localhost/Learnzia/assets/uploads/user/".$sty['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid position-absolute shadow' 
                                style='width:35px; left:10px; top:10px;'>
                            <table class='mt-3'>
                                <tr>
                                    <th width='50%'></th>
                                    <th width='50%'></th>
                                </tr>
                                <tr>
                                    <td>";
                                        //Upvote and downvote.
                                        $y = 0;
                                        $found = 0;
                                        $id_up = 0;
                                        foreach($allVoteStory as $vote){
                                            if($vote['id_context'] == $sty['id_story']){
                                                $y++;
                                                if($vote['id_user'] == $this->session->userdata('userIdTrack')){
                                                    $found++;
                                                    $id_up = $vote['id_up'];
                                                }
                                            }
                                        }
                    
                                        if($found == 1){
                                            echo "
                                            <form action='homeCtrl/downvoteStory' method='POST'>
                                                <input hidden name='id_up' value='".$id_up."'>
                                                <button type='submit' class='btn btn-success mx-2 rounded-pill' id='btn-up-story' title='up'> ".$sty['story_option_1']."</button>
                                            </form>";
                                        } else {
                                            echo "
                                            <form action='homeCtrl/upvoteStory' method='POST'>
                                                <input hidden name='id_story' value='".$sty['id_story']."'>
                                                <button type='submit' class='btn btn-primary mx-2 rounded-pill' id='btn-up-story' title='up' style='background:#F1c40f;'> ".$sty['story_option_1']."</button>
                                            </form>";
                                        }
                                    echo "
                                    </td>
                                    <td>";
                                    //Upvote and downvote.
                                    $y = 0;
                                    $found = 0;
                                    $id_up = 0;
                                    foreach($allVoteStory as $vote){
                                        if($vote['id_context'] == $sty['id_story']){
                                            $y++;
                                            if($vote['id_user'] == $this->session->userdata('userIdTrack')){
                                                $found++;
                                                $id_up = $vote['id_up'];
                                            }
                                        }
                                    }
                
                                    if($found == 1){
                                        echo "
                                        <form action='homeCtrl/downvoteStory' method='POST'>
                                            <input hidden name='id_up' value='".$id_up."'>
                                            <button type='submit' class='btn btn-success mx-2 rounded-pill' id='btn-up-story' title='up'> ".$sty['story_option_2']."</button>
                                        </form>";
                                    } else {
                                        echo "
                                        <form action='homeCtrl/upvoteStory' method='POST'>
                                            <input hidden name='id_story' value='".$sty['id_story']."'>
                                            <button type='submit' class='btn btn-primary mx-2 rounded-pill' id='btn-up-story' title='up' style='background:#F1c40f;'> ".$sty['story_option_2']."</button>
                                        </form>";
                                    }
                                    echo "
                                    </td>
                                </tr>
                            </table>
                        </button>
                    </div>";
                }
            }
        ?>
    </div>
</div>