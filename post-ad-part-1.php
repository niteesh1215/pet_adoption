         <div class="background-blur"></div>
          <form id="uploadImage"  enctype="multipart/form-data" method="post" action="user_registration_script.php">
            <div class="uploadDiv">
                
                <div class="ad-details"> 
                 <header>
                     UPLOAD DETAILS<span class="close_window"> X </span>
                    </header>
                
                <div class="row">
                   
                    <?php
                           if(isset($_SESSION['email'])){
                           ?>
                    <div class="col-lg-4  col-md-12 col-sm-12">
                      
                        <div class="details_category">     
                            <div class="form-group">
                                <input type="text" class="form-control pet_name_input" name="pet_name" placeholder="Pet Name" required="Enter the pet name">
                            </div>
                            <div class="invalid-feedback pet_name_empty hidden">
                                    Please enter pet name (enter 'unknown' if not known).
                            </div>
                            
                             <div class="form-group">
                                
                                 <input type="hidden" class="form-control pet_category_input" name="pet_category" value="" required="Select the choice"  >
                                <p class="pet_category_dummy dummy_dropdown" onclick="displayOptions(this,'.pet_category_input','.pet_category')">Select Category <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                <div class="options pet_category" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Cat</p>
                                    <p onclick="selectOption(this)">Dog</p>
                                    <p onclick="selectOption(this)">Fish</p>
                                </div>
                                <div class="invalid-feedback pet_category_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                
                                <input type="hidden" class="form-control breed_input" name="breed" value=""   >
                                <p class="breed_dummy dummy_dropdown" onclick="displayOptions(this,'.breed_input','.breed')">Select breed <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                <div class="options breed" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Please select pet category first</p>
                                    
                                </div>
                                
                                <div class="invalid-feedback breed_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                
                                <input type="hidden" class="form-control age_input" name="age" value=""  required="Select the choice" >
                                <p class="age_dummy dummy_dropdown" onclick="displayOptions(this,'.age_input','.age')">Select Age <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                <div class="options age" style="height: 0px; padding: 0;">
                                    <div style="padding:5px;display: flex; align-items: center;justify-content: space-around">
                                        <div style="display: flex; align-items: center;"><input type="radio"  class="" name="age_type" value="Month(s)"  checked ><span style="font-size: 12px;margin-bottom: -2px;">&nbsp;&nbsp;Months&nbsp;&nbsp;</span></div>
                                        <div style="display: flex; align-items: center;"><input type="radio" class="" name="age_type" value="Year(s)" ><span style="font-size: 12px;margin-bottom: -2px;">&nbsp;&nbsp;Years&nbsp;&nbsp;</span></div>
                                    </div>
                                    
                                    <p onclick="selectOption(this)">Unknown</p>
                                    <p onclick="selectOption(this)">1</p>
                                    <p onclick="selectOption(this)">2</p>
                                    <p onclick="selectOption(this)">3</p>
                                    <p onclick="selectOption(this)">4</p>
                                </div>
                                
                                <div class="invalid-feedback age_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control size_input" name="size" value=""  required="Select the choice" >
                                <p class="size_dummy dummy_dropdown" onclick="displayOptions(this,'.size_input','.size')">Pet Size <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                
                                <div class="options size" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Small</p>
                                    <p onclick="selectOption(this)">Medium</p>
                                    <p onclick="selectOption(this)">Large</p>
                                </div>
                                
                                <div class="invalid-feedback size_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>

                        </div>
                           
                            
                    </div>
                        
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="details_category">
                            
                            
                             <div class="form-group">
                                <input type="hidden" class="form-control weight_input" name="weight" placeholder="Weight" required="true">
                                
                                <p class="weight_dummy dummy_dropdown" onclick="displayOptions(this,'.weight_input','.weight')">Weight in Kgs <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                
                                <div class="options weight" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Unknown</p>
                                    <p onclick="selectOption(this)">1</p>
                                    <p onclick="selectOption(this)">2</p>
                                    <p onclick="selectOption(this)">3</p>
                                    <p onclick="selectOption(this)">4</p>
                                </div>
                                <div class="invalid-feedback weight_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            
                            <div class="form-group">
                            <input type="hidden" class="form-control gender_input" name="gender" placeholder="Gender" required="true">
                                
                                <p class="gender_dummy dummy_dropdown" onclick="displayOptions(this,'.gender_input','.gender')">Select gender <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                
                                <div class="options gender" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Unknown</p>
                                    <p onclick="selectOption(this)">Male</p>
                                    <p onclick="selectOption(this)">Female</p>
                             
                                </div>
                                <div class="invalid-feedback gender_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            
                            <div class="form-group">
                            <input type="hidden" class="form-control vaccinated_input" name="vaccinated" placeholder="vaccinated" required="true">
                                
                                <p class="vaccinated_dummy dummy_dropdown" onclick="displayOptions(this,'.vaccinated_input','.vaccinated')">Vaccinated ? <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                
                                <div class="options vaccinated" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Unknown</p>
                                    <p onclick="selectOption(this)">Yes</p>
                                    <p onclick="selectOption(this)">No</p>
                             
                                </div>
                                <div class="invalid-feedback vaccinated_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            
                            <div class="form-group">
                            <input type="hidden" class="form-control neutured_input" name="neutured" placeholder="neutured" required="true">
                                
                                <p class="neutured_dummy dummy_dropdown" onclick="displayOptions(this,'.neutured_input','.neutured')">Neutured ? <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>
                                
                                <div class="options neutured" style="height: 0px; padding: 0;">
                                    <p onclick="selectOption(this)">Unknown</p>
                                    <p onclick="selectOption(this)">Yes</p>
                                    <p onclick="selectOption(this)">No</p>
                             
                                </div>
                                <div class="invalid-feedback neutured_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            
                            <div class="form-group">
                                    <input type="text" class="form-control city_village_input" name="city_village" placeholder="City/Village" required="true">
                                    <div class="invalid-feedback city_village_empty hidden">
                                        Please fill this field.
                                    </div>
                            </div>
                               
                                
                        </div>
                           
                    </div>
                        
                     <div class="col-lg-4  col-md-12 col-sm-12">
                        <div class="details_category">
                            
                            <div class="form-group">
                                <input type="text" class="form-control district_input" name="district" placeholder="District Name" required="true">
                                <div class="invalid-feedback district_empty hidden">
                                    Please fill this field.
                                </div>
                            </div>

                            <div class="form-group">
                                    <input type="hidden" class="form-control state_input" name="state"  required="true">

                                    <p class="state_dummy dummy_dropdown" onclick="displayOptions(this,'.state_input','.state')">Select state <span style="transform: translateY( -50% ) rotate(-90deg);">&#60;</span></p>

                                    <div class="options state" style="height: 0px; padding: 0;">
                                        <p onclick="selectOption(this)">Goa</p>
                                        <p onclick="selectOption(this)">Karnataka</p>
                                        <p onclick="selectOption(this)">Maharastra</p>

                                    </div>
                                    <div class="invalid-feedback state_empty hidden">
                                    Please select your choice.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" style="color:#b6b6b6;padding-left: 18px;opacity: 0.8;"><span style="color: #F9575C; font-size: 12px; font-weight: 100;"> Make it short and sweet</span></label>
                                <textarea  class="description_input" style="width:100%; height: 140px;"  name="description" placeholder="Description" required="true"></textarea>
                                <div class="invalid-feedback description_empty hidden">
                                    Please fill this field.
                                </div>
                            </div>    
                        </div>
                     </div>
                     
                        
                         
                        
                </div>
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="details_category" >
                                <div class="form-group">
                                    <label for="about_pet" style="color:#b6b6b6;padding-left: 8px;opacity: 0.8;">About Pet<span style="color: #F9575C; font-size: 12px; font-weight: 100;"> Write something about the pet.</span></label>
                                    <textarea type="text" style="height: 150px;" class="form-control" name="about_pet"  ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="adoption_rules" style="color:#b6b6b6;padding-left: 8px;opacity: 0.8;">Adoption rules<span style="color: #F9575C; font-size: 12px; font-weight: 100;"> Write something about the adoption rules or guidelines ( if any).</span></label>
                                    <textarea type="text" style="height: 150px;" class="form-control" name="adoption_rules"  ></textarea>
                                </div>  
                                <div class="form-group">
                                    <input style="margin-left: 50%; transform: translateX( -50% );" type="button" class="btn next-page" value="Next">
                                </div>
                             </div>
                         </div>
                         <?php
                           }else{
                               echo '<p style="width:100%;font-size:15px;text-align:center; color:red; position: absolute; top:50%; transform:translateY(-50%);">Login to Post Ads. <a href="javascript:open_login();">Click Here</a></p>';
                           }
                            ?>
                     </div>   
              
           </div>
           <?php include 'post-ad-part-2.php';?>
       </div>
              <script> 
                  function open_login()
                  {
                      close_ad_window();
                      login();
                  }
              </script>
          </form>
           
    

