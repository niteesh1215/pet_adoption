        <div class="imageUploadDiv">
            <header>
               <span class="previous_window"> &#8678; </span> UPLOAD IMAGES <span class="close_window"> X </span>
            </header>
            <div class="preview">
                <p>No images currently selected for upload.</p>
            </div>
            <div class="image_list"></div>

                <div class="controls">
                    <div class="upload-btn-wrapper">
                        <button class="btn">Select Images</button>
                        <input id="select_file" type='file'  multiple accept=".png, .jpg, .jpeg"  />
                    </div>
                    <input type="submit" value="Post Ad." class="btn">
                </div>
            <!-- p element with id msg to display success msg --> 
            <p id='msg'></p>
        </div>   

    <script>
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

        /*function returnFileSize(number) {
            if (number < 1024) {
                return number + 'bytes';
            } else if (number >= 1024 && number < 1048576) {
                return (number / 1024).toFixed(1) + 'KB';
            } else if (number >= 1048576) {
                return (number / 1048576).toFixed(1) + 'MB';
            }
        }*/





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
        $('#uploadImage').submit(function (e) {

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
                        alert("Advertisement successfully uploaded");
                        $('.background-blur').css({'display':'none','opacity':'0'});
                        $('.UploadDiv').css({'top':'-200vh'});
                        $('#uploadImage').empty();
                        $('#uploadImage').html(reloadHTML);
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
                        url:'upload.php',
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

