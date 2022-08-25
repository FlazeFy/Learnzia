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
        <button class='btn btn-primary border-0 py-3' style='background-color: #00a13e; max-width:120px; max-height:120px;'>
            <img src='http://localhost/Learnzia/assets/uploads/user/<?php foreach($dataUser as $u){ echo $u['imageURL']; }?>.jpg' alt='New Post' class='rounded-circle img-fluid' 
                style='width:60px; height:60px;'>
            <h5 class="mt-2" style='font-size:14px; color:whitesmoke;'>New Stories</h5>
        </button>

        <!--Story list-->
        <?php
            foreach($allStory as $sty){
                echo"
                <div class='rounded p-2 ms-2 position-relative' id='storyBox'
                    style='width:250px; background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.3)) , url(http://localhost/Learnzia/assets/uploads/story/".$sty['story_url'].".jpg);'>
                    <button type='submit' class='w-100 h-100 border-0 bg-transparent' title='See Story'>
                        <img src='http://localhost/Learnzia/assets/uploads/user/".$sty['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid position-absolute shadow' 
                            style='width:40px; right:10px; top:10px;'>
                        <div class='d-flex justify-content-between mt-4'>
                            <h6 class='mb-0' id='storyTitle' style='color:#f1c40f;'>".$sty['username']."</h6><br>
                        </div>
                        <a class='text-white float-start' id='storyTitle'>".$sty['story_caption']."</a>
                    </button>
                </div>";
            }
        ?>
    </div>
</div>