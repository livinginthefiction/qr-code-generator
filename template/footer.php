<div class="pt-3">
  <div class="container">
    <hr>
  	<div class="row pt-5 pb-4">
    	<div class="col">
        <p>This is an example of footer. Place here your contents, or remove the file <code>/template/<span class="bg-danger text-white px-1">footer.php</span></code>.</p>
      </div>
    </div>
    <hr>
    <div class="row py-2 small mb-3">
      <div class="col-6"><?php echo qrcdr()->getString('title').' &copy; '.date('Y'); ?></div>
        <div class="col-6"></div>
    </div>
  </div>
</div>

<div class="position-relative">
                    <div class="image-editor">
                        <button class="select-image-btn">UPLOAD</button>
                        <input type="file" class="cropit-image-input">
                        <div class="cropit-preview"></div>
                        <input type="range" class="cropit-image-zoom-input qrcdr-slider-input">
                        <button class="export">Export</button>
                    </div>

</div>