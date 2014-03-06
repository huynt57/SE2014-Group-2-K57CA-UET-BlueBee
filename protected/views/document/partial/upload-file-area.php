<!--Drag and Drop file to upload-->

<script id="imageTemplate" type="text/x-jquery-tmpl"> 
    <div class="imageholder">
		<figure>
			<img src="${filePath}" alt="${fileName}"/>
			<figcaption>
				${fileName} <br/>
				<span>Original Size: ${fileOriSize} KB</span><br/>
				<span>Upload Size: ${fileUploadSize} KB</span>
			</figcaption>
		</figure>
	</div>
</script>

<div class="w-tabs layout_accordion type_toggle" style="margin-bottom: 5%">
		<div class="w-tabs-h">
			<div class="w-tabs-section with_icon">
				<div class="w-tabs-section-title">
					<span class="w-tabs-section-title-icon icon-book"></span>
					<span class="w-tabs-section-title-text">Bạn muốn chia sẻ 1 tài liệu lên?</span>
					<span class="w-tabs-section-title-control"><i class="icon-angle-down"></i></span>
				</div>
				<div class="w-tabs-section-content">
					<form class="g-form" action="" method="post">
	                    <div class="g-form-group">
	                    	<div class="g-form-group-rows">
								<div class="g-form-row-field">
                                    <div class="g-input">
                                        <input type="text" name="document_name" id="document_name" value="" style="max-width: 50%; margin-left: 5%; margin-top: 2%; border-radius: 10px;" placeholder="Tên Tài Liệu *">
                                    </div>
                                </div>
							</div>
	                        <div class="g-form-group-rows">
								<div id="droparea" style="margin: 2% 5% 2% 5%; max-height: 180px">
									<div class="dropareainner">
										<div style="margin: 4% auto">
											<p class="dropfiletext">Thả file vào đây</p>
											<p>Hoặc</p>
											<input type="button" value="Chọn file" id="uploadbtn" class="g-btn type_primary size_small"/>
											<p id="err">Chờ đã. Bạn hãy bật JavaScript mới xài đc :(</p>
										</div>
									</div>
									<input id="upload" type="file" multiple />
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>