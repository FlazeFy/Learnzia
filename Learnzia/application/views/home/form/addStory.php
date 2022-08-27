<style>
    .story_category{
        border: 1.5px solid #f1c40f;
        color: #f1c40f;
        text-align:center;
    }

    .story_category:hover{
        background: #f1c40f;
        color: #212121;
    }

    .file {
        visibility: hidden;
        position: absolute;
    }
</style>

<div class='modal fade' id='storyModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog modal-lg' role='document'>
		<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Story</h5>
				<img  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
				style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
			</div>
				<div class='modal-body' style='height:550px;'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <button class='story_category btn btn-transparent fw-bold p-4 w-100' id='story_category'
                                data-toggle="collapse" data-target="#imageStoryCollapse"><i class="fa-regular fa-image" style='font-size:46px;'></i> Image</button>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <button class='story_category btn btn-transparent fw-bold p-4 w-100' id='story_category'
                                data-toggle="collapse" data-target="#videoStoryCollapse"><i class="fa-solid fa-video" style='font-size:46px;'></i> Video</button>
                        </div>    
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <button class='story_category btn btn-transparent fw-bold p-4 w-100' id='story_category'
                                data-toggle="collapse" data-target="#votingStoryCollapse"><i class="fa-solid fa-check-to-slot" style='font-size:46px;'></i> Voting</button>
                        </div>    
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <button class='story_category btn btn-transparent fw-bold p-4 w-100' id='story_category'
                                data-toggle="collapse" data-target="#audioStoryCollapse"><i class="fa-solid fa-microphone" style='font-size:46px;'></i> Audio</button>
                        </div>    
                    </div>
                    <div class="accordion" id="accordionStory">
                        <!--Image story-->
                        <div class="collapse" id="imageStoryCollapse" data-parent="#accordionStory">
                            <form method='POST' action='homeCtrl/sendStory' enctype="multipart/form-data">
                                <input name='story_type' value='image' hidden>
                                <div class="container bg-transparent p-2">
                                    <h5>Image</h5>
                                    <div class='row'>
                                        <div class='col-md'>
                                            <img id="frame" src="http://localhost/Learnzia/assets/images/icon/NoImage.png" class="img-fluid" style="width:200px;"/>
                                            <input class="form-control mb-3" type="file" id="formFile" onchange="preview()" name="story_url" accept="image/jpg" required>
                                            <a onclick="clearImage()" class="btn btn-danger mx-1"><i class="fa-solid fa-trash"></i> Reset</a>
                                        </div>
                                        <div class='col-md'>
                                            <div class="form-group mb-3">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <label class="label text-primary" for="text">Story Interact <i class="fa-solid fa-circle-info fa-lg"></i></label>
                                                    </div>
                                                    <div class="col-md">
                                                        <select class="form-control" name="story_interact">
                                                            <option value='yes'>yes</option>
                                                            <option value='no'>no</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="label text-primary" for="text">Caption</label>
                                                    <textarea rows="4" cols="60" name="story_caption" class='form-control'>Type your caption here...</textarea>
                                                </div>
                                                <button class="btn btn-success mx-1" type="submit" value="Save"><i class="fa-solid fa-plus"></i> Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Video story-->
                        <div class="collapse" id="videoStoryCollapse" data-parent="#accordionStory">
                            <div class="container bg-transparent p-2">
                                <h5>Video</h5>
                                <div class='row'>
                                    <div class='col-md'>
        
                                    </div>
                                    <div class='col-md'>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Voting story-->
                        <div class="collapse" id="votingStoryCollapse" data-parent="#accordionStory">
                            <div class="container bg-transparent p-2">
                                <h5>Voting</h5>
                                <div class='row'>
                                    <div class='col-md'>
        
                                    </div>
                                    <div class='col-md'>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Audio story-->
                        <div class="collapse" id="audioStoryCollapse" data-parent="#accordionStory">
                            <div class="container bg-transparent p-2">
                                <h5>Audio</h5>
                                <div class='row'>
                                    <div class='col-md'>
        
                                    </div>
                                    <div class='col-md'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		
		</div>
	</div>
</div>
