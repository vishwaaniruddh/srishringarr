
                                <form action="d3.php" method="POST" enctype="multipart/form-data">
                                                
                                    <div class="wrapper row">
                                      <div class="box col-sm-3">
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                          <label>
                                            <input type="file" name="aniruddh" class="image-upload" accept="image/*" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="box col-sm-3">
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                          <label>
                                            <input type="file" name="rahul" class="image-upload" accept="image/*" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="box col-sm-3">
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                          <label>
                                            <input type="file" name="bhai" class="image-upload" accept="image/*" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="box col-sm-3">
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                          <label>
                                            <input type="file" name="swap" class="image-upload" accept="image/*" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="box col-sm-3">
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                          <label>
                                            <input type="file" name="bhabhi" class="image-upload" accept="image/*" />
                                          </label>
                                        </div>
                                      </div>
                                      
                                    </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                              <div class="row" id="tabresult"></div>
                                            
                                            
                                            
                                            

                                            
                                            
                                            
                                        
                                            
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <br>
                                                    <input type="submit" name="submit" class="btn btn-danger">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            </form>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
                    
                    
    
    
    <style>
        .box {
  display: block;
  min-width: 300px;
  height: 300px;
  margin: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  overflow: hidden;
}

.upload-options {
  position: relative;
  height: 75px;
  background-color: #404e67;
  cursor: pointer;
  overflow: hidden;
  text-align: center;
  transition: background-color ease-in-out 150ms;
}
.upload-options:hover {
  background-color: #7fb1b3;
}
.upload-options input {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.upload-options label {
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%;
  font-weight: 400;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  overflow: hidden;
}
.upload-options label::after {
  content: "add";
    font-family: "Material Icons";
    position: absolute;
    font-size: 1.5rem;
    color: #e6e6e6;
    top: calc(50% - 1.5rem);
    left: calc(50% - 2.25rem);
    z-index: 0;
}
.upload-options label span {
  display: inline-block;
  width: 50%;
  height: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  vertical-align: middle;
  text-align: center;
}
.upload-options label span:hover i.material-icons {
  color: lightgray;
}

.js--image-preview {
  height: 225px;
  width: 100%;
  position: relative;
  overflow: hidden;
  background-image: url("");
  background-color: white;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.js--image-preview::after {
    content: "photo_size_select_actual";
    font-family: "Material Icons";
    position: relative;
    font-size: 1.5em;
    color: #e6e6e6;
    top: calc(50% - 2rem);
    left: 8%;
    z-index: 0;
}
.js--image-preview.js--no-default::after {
  display: none;
}
.js--image-preview:nth-child(2) {
  background-image: url("http://bastianandre.at/giphy.gif");
}

i.material-icons {
  transition: color 100ms ease-in-out;
  font-size: 2.25em;
  line-height: 55px;
  color: white;
  display: block;
}

.drop {
  display: block;
  position: absolute;
  background: rgba(95, 158, 160, 0.2);
  border-radius: 100%;
  transform: scale(0);
}

.animate {
  -webkit-animation: ripple 0.4s linear;
          animation: ripple 0.4s linear;
}

@-webkit-keyframes ripple {
  100% {
    opacity: 0;
    transform: scale(2.5);
  }
}

@keyframes ripple {
  100% {
    opacity: 0;
    transform: scale(2.5);
  }
}
    </style>
    
        <script>
        
        function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}


