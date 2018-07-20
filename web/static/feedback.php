<form name="feedBackForm" action="" validate="true">
    <div class="row">
        <div class="col-lg-8">
            <div class="control-group form-group">
                <div class="controls">
                    <label> * Message:</label>
                    <textarea rows="10" cols="100" class="form-control" id="message" name="message"
                              data-validation-required-message="Please enter your message" maxlength="999"
                              style="resize:none" required="required" ></textarea>
                </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
        </div>
        <div class="col-lg-4">
            <div class="control-group form-group">
                <div class="controls">
                    <label> * Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required="required"
                           data-validation-required-message="Please enter your name.">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label> * Email:</label>
                    <input type="email" class="form-control" id="email"  name="email" required="required"
                           data-validation-required-message="Please enter your email.">
                </div>
            </div>

            <div class="control-group form-group">
                <div class="controls">
                    <label> * Contact Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required="required">
                </div>
            </div>
            <button type="submit"  onclick="gtag('event', 'sendbutton',{'event_category': 'send_button'});" class="button yellow btn" id="sendMessageButton">Send Message</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 text-center" id="success_message">

        </div>
    </div>
</form>
<!-- /.row -->
