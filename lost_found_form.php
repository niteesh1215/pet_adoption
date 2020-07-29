

<div class="lost_found login">
                
                    <div class="col-lg-6 col-sm-6 col-lg-offset-3 col-sm-offset-3 col-xs-12">
                        <div class="close_wrapper">
                            <span class="close_btn" onclick="close_dynamic_window()">x</span>
                        <div class="panel">
                        <div class="panel-heading">
                            <span class="previous" onclick="goToDetailsForm()"> &#8678; </span>
                                <h3>Lost/Found</h3>
                            </div>
                        <div class="panel-body">
                            
                            <form id="lostFoundForm" method="post" >
                            <div class="lost_found_details">
                                <div class="type">
                                <div>
                                    <input type="radio" id="male" name="type" value="found" onclick="hideAge()">
                                <label for="male">Found</label><br>
                                </div>
                                <div>
                                    <input type="radio" id="female" name="type" value="lost" checked="true" onclick="showAge()">
                                <label for="female">Lost</label><br>    
                                </div>
                                </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Pet Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="breed" placeholder="Pet breed" required="true" >
                            </div> 
                            <div class="form-group age">
                                <input type="text" class="form-control" name="age" placeholder="Pet age" required="true">
                            </div>
                            
                             <div class="form-group">
                                 <input type="text" class="form-control" name="address" placeholder="Lost/Found location" required>
                                <p class="confirm-pass-invalid" style="text-align: center; color: red;"></p>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="species" placeholder="Species" required="true">
                            </div>
                            <div class="form-group">    
                                <textarea name="description" placeholder="Description" required="true" style="width: 100%; height: 100px;" ></textarea>
                            </div>    
                             <div class="form-group">
                                 <input style="margin-left: 50%; transform: translateX( -50% );" type="button" class="btn" value="Next" onclick="goToImageUpload()">
                             </div>
                            </div>    
                            <div class="upload_img">    
                                <div class="preview">
                                    <p>No images currently selected for upload.</p>

                                </div>
                                <div class="image_list"></div>
                                <p id='msg'></p>
                                <div class="controls" style="position: relative">
                                    <div class="upload-btn-wrapper">
                                        <button class="btn">Select Images</button>
                                        <input id="select_file" type='file' accept=".png, .jpg, .jpeg" multiple="" />
                                    </div>
                                    <input type="submit" value="Upload pet" class="btn" style="outline: none;">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                        </div>
                    </div>
    <script>
        
        function hideAge(){
            $('.age').css('display','none');
        }
        function showAge(){
            $('.age').css('display','block');
        }
        
        function goToImageUpload(){
            $('.lost_found_details').css('display','none');
            $('.upload_img').css('display','block');
            $('.previous').css('display','block');
        }
        
        function goToDetailsForm(){
            $('.lost_found_details').css('display','block');
            $('.upload_img').css('display','none');
            $('.previous').css('display','none');
        }
        
        const input = document.querySelector('#select_file');
        const preview = document.querySelector('.preview');
        const imageScroller = document.querySelector('.image_list')
        
        const fileTypes = [
            'image/jpeg',
            'image/jpg',
            'image/png'
        ];
        const cropper = new Array(5);
        var count = 0;
        
        input.addEventListener('change', updateImageDisplay);
        
        function updateImageDisplay() 
        {
           imageScroller.innerHTML="";
            count=0;
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
                const list = document.createElement('ul');
                preview.appendChild(list);
                for (const file of curFiles) 
                {
                    if (count === 5)
                        break;
                    
                    const listItem = document.createElement('li');
                    
                    if (validFileType(file)) 
                    {
                        // para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
                        const image = document.createElement('img');
                        const imageCopy = document.createElement('img');
                        image.src = URL.createObjectURL(file);
                        imageCopy.src = URL.createObjectURL(file);
                        imageCopy.setAttribute("onclick", "imageSelector(" + count + ",this)");
                        
                        imageScroller.appendChild(imageCopy);
                        image.id = 'image' + count;
                        listItem.appendChild(image);
                        //const image = document.getElementById('image'+count);
                        cropper[count] = new Cropper(image, {
                            aspectRatio: 1 / 1,
                        });

                        list.appendChild(listItem);
                        if (count === 0)
                        {
                           imageCopy.style = 'border:5px outset skyblue;opacity:1;'
                        }
                        else
                        {
                            listItem.style='top:-100vh;'
                        }

                        count++;

                    } 
                    else
                    {
                        window.alert("Invalid file type.");
                    }

                }

            }
        }

        function validFileType(file) {
            return fileTypes.includes(file.type);
        }

        
        function imageSelector(index_no, elem)
        {
            var c = imageScroller.children;
            var lichild = document.querySelectorAll('.preview ul li');
            for (var i = 0; i <imageScroller.childElementCount; i++)
            {
                c[i].style = '';
                lichild[i].style = 'top:-100vh;';
            }
            
            lichild[index_no].style = '';
            
            elem.style = 'border:5px outset skyblue;opacity:1;';
        }



        




        //Adding a submit function to the form 
        $('#lostFoundForm').submit(function (e) {

            //Preventing the default behavior of the form 
            //Because of this line the form will do nothing i.e will not refresh or redirect the page 
            e.preventDefault();
            
            const formData = new FormData(this);
            var i=count;
            
            
            function getBlobToUpload(formData,decreamentVal)
            {
                
                    count-=decreamentVal;
                    if(count===0) 
                    {
                        alert("Successfully uploaded");
                        close_dynamic_window();
                        return;
                    }
                    console.log(i-count);
                    
                    cropper[i-count].getCroppedCanvas({
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
                    cropper[i-count].getCroppedCanvas().toBlob((blob) => {
                    // Pass the image file name as the third parameter if necessary.
                    formData.append('photo', blob,'pet.jpg');
                    //formData.append('count', count);
                    
                    
                     $.ajax({
                        url:'upload_lost_found.php',
                        method: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                              //If the request is successfull we will get the scripts output in data variable 
                              //Showing the result in our html element 
                              switch(data)
                              {
                                  case '2' : $('#msg').html("The file is too large. Please select new set of images");
                                           getBlobToUpload(new FormData(),0);break;
                                  case '1' : $('#msg').html("Uploaded successfully");
                                           getBlobToUpload(new FormData(),1);break;
                                  case '0' : $('#msg').html("Upload unsucessful");
                                           getBlobToUpload(new FormData(),0);break;
                                  default : $('#msg').html(data);
                              }


                          },
                        error(data) {
                          console.log(data);
                        },
                    });
                    
                    }, 'image/jpg' );
               

            }
            
            getBlobToUpload(formData,0);
            
        });
        
    </script>
</div>