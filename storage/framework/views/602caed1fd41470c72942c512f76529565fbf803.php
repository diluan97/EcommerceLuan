;
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('sublime/styles/contact.css')); ?>">

<?php $__env->startSection('content'); ?>
<script type='text/javascript'>
     function submit()
      {
         document.forms["contact_form"].submit();
      }
</script>
<div class="contact" style="padding-top:130px">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
                         <?php if(session()->has('success')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
						<div class="section_title">Liên Lạc</div>
						<div class="section_subtitle">Xin Chào </div>
						<div class="contact_form_container">
							<form action="<?php echo e(route('send-lien-he')); ?>" method="POST" name="contact_form" id="contact_form" class="contact_form">
                                <?php echo csrf_field(); ?>
                                <div>
									<!-- Subject -->
									<label for="contact_company">Họ Tên</label>
									<input type="text" name="name" id="contact_company" class="contact_input" required>
                                </div>
                                <div>
									<!-- Subject -->
									<label for="contact_company">Địa Chỉ Email</label>
									<input type="email" name="email" id="contact_company" class="contact_input" required>
                                </div>
                                <div>
									<!-- Subject -->
									<label for="contact_company">Số Điện Thoại</label>
									<input type="text" name="phone" id="contact_company" class="contact_input" required>
                                </div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Tiêu Đề</label>
									<input type="text"  name="subject" id="contact_company" class="contact_input" required>
								</div>
								<div>
									<label for="contact_textarea">Nội Dung Liên Lạc</label>
									<textarea name="message" id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
								</div>
                                <button type="submit" class="button contact_button"><span>Send Message</span></button>
                                
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<div class="contact_info_title">Marketing</div>
							<ul>
								<li>Phone: <span>0926 010 748</span></li>
								<li>Email: <span>duongdiluan1997@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Vận Chuyển & Trả Hàng</div>
							<ul>
								<li>Phone: <span>0926 010 748</span></li>
								<li>Email: <span>duongdiluan1997@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Liên Hệ Trực Tiếp</div>
							<ul>
								<li>Phone: <span>0926 010 748</span></li>
								<li>Email: <span>duongdiluan1997@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Google Map -->
					<div class="map">
						
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.816454476317!2d106.61306541438472!3d10.748624962646357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dcd3b64f047%3A0x8d98bbc73c91a990!2zMTgxIFbDoG5oIMSQYWkgVHJvbmcsIELDrG5oIFRy4buLIMSQw7RuZyBCLCBCw6xuaCBUw6JuLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1547831748289" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
                </div>
			</div>
		</div>
	</div>

<?php echo $__env->make('layouts.guest.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>