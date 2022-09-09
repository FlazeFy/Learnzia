<form method='POST' action='ContactCtrl/sendRMessage' enctype='multipart/form-data'>
    <input type='text' class='form-control' name='id_social' value='".$c['id_social']."' hidden>
    <button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
    <input class='form-control' type='text' placeholder='Type your message here...' style='width:70%; float:right; margin-right:10px;' name='message'>
    <label class='switch' style='float:left;'>
        <input type='checkbox' name='imageSwitchMsg'>
            <span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain".$c['id_social']."'></span>
    </label>
    <br><a style='color:whitesmoke; float:left; margin-left:-9%;'>Image</a>
    <div class='collapse' id='collapseImageMain".$c['id_social']."'>
        <div class='container-fluid' style='width:90%; float:right; margin-top:2%; margin-right:-9%;'>
            <div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
                border-radius:5px;'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'>jpg</span>
                </div>
                <div class='custom-file'>
                    <input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMsg' accept='image/*'>
                    <label class='custom-file-label text-left' for='uploadImage'>file size max 5 mb</label>
                </div>
            </div>
        </div>
    </div>
</form>