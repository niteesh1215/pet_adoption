<form id="uploadImage">
    <div class="preview">
        <p>No images currently selected for upload.</p>

    </div>
    <div class="progress">
        <div class="progress-bar"></div>
    </div>
    <p id='msg'></p>
    <div class="controls">
        <div class="upload-btn-wrapper">
            <button class="btn">Select Images</button>
            <input id="select_file" type='file' accept=".png, .jpg, .jpeg"  />
        </div>
        <input type="submit" value="Change Profile Pic." class="btn" style="outline: none;">
    </div>
    
    
    <script>
        const input = document.querySelector('#select_file');
        const preview = document.querySelector('.preview');
        input.addEventListener('change', updateImageDisplay);
        const fileTypes = [
            'image/jpeg',
            'image/jpg',
            'image/png'
        ];
        var cropper = null;

        function updateImageDisplay()
        {
            //window.alert("hi");
            while (preview.firstChild)
            {
                preview.removeChild(preview.firstChild);
            }

            const curFiles = input.files;
            if (curFiles.length === 0)
            {
                const para = document.createElement('p');
                para.textContent = 'No files currently selected for upload';
                preview.appendChild(para);
            } else
            {

                for (const file of curFiles)
                {
                    if (validFileType(file))
                    {
                        // para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
                        const div = document.createElement('div');
                        preview.appendChild(div);
                        const image = document.createElement('img');
                        image.src = URL.createObjectURL(file);
                        //imageCopy.setAttribute("onclick", "imageSelector(" + count + ",this)");
                        div.appendChild(image);
                        //const image = document.getElementById('image'+count);
                        cropper = new Cropper(image, {
                            aspectRatio: 1 / 1,
                        });
                    } else
                    {
                        window.alert("Invalid file type.");
                    }

                }

            }
        }

        function validFileType(file) {
            return fileTypes.includes(file.type);
        }



        $('#uploadImage').submit(function (e) {

            //Preventing the default behavior of the form 
            //Because of this line the form will do nothing i.e will not refresh or redirect the page 
            e.preventDefault();

            const formData = new FormData(this);

            cropper.getCroppedCanvas({
                width: 160,
                height: 90,
                minWidth: 256,
                minHeight: 256,
                maxWidth: 1080,
                maxHeight: 1080,
                fillColor: '#fff',
                imageSmoothingEnabled: false,
                imageSmoothingQuality: 'high',
            });
            cropper.getCroppedCanvas().toBlob((blob) => {
                // Pass the image file name as the third parameter if necessary.
                formData.append('photo', blob, 'profile.jpg');
                //formData.append('count', count);


                $.ajax({
                    url: 'update_profile_image.php',
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100).toFixed(2);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete+'%');
                                if(percentComplete > 5.00)
                                {
                                    $(".progress-bar").css("background-color","#f63a0f");
                                    if(percentComplete > 25.00)
                                    {
                                        $(".progress-bar").css("background-color","#f27011");
                                        if(percentComplete > 50.00)
                                        {
                                            $(".progress-bar").css("background-color","#f2b01e");
                                            if(percentComplete > 75.00)
                                            {
                                                $(".progress-bar").css("background-color","#f2d31b");
                                                if(percentComplete >= 100.00)
                                                {
                                                        $(".progress-bar").css("background-color","#86e01e");
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }, false);
                        return xhr;
                    },
                    method: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $(".progress-bar").width('2%');
                        $(".progress-bar").css("background-color","#f63a0f");
                        $(".progress").css("display","block");
                    },
                    success: function (data) {
                        //If the request is successfull we will get the scripts output in data variable 
                        //Showing the result in our html element 
                        var response = JSON.parse(data);
                        //alert(response);
                        switch (response.status)
                        {
                            case 2 :
                                $('#msg').html("The file is too large. Please select new image");
                                break;
                            case 1 :
                                $('#msg').html("Uploaded successfully");
                                $('.photo').attr("src", response.img_path);
                                //close_update_profile_window();
                                break;
                            case 0 :
                                $('#msg').html("There was an error");
                                break;
                            default :
                                $('#msg').html(response.status);
                        }


                    },
                    error(data) {
                        console.log(data);
                    },
                });

            }, 'image/jpg');
        });
    </script>
</form>
