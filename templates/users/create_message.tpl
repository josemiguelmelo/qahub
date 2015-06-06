{include file='common/header.tpl'}
{include file='common/navigation.tpl'}


    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body" >
               <h2> Create your message</h2>
            </div>
        </div>
    </div>


    <div class="hpanel">
        <div class="panel-body login-box col-lg-10" style="margin-left:7.2%;margin-right:3.6%">
     
                    <div class="form-group">
                        <label>Destination</label>
                        <input type="email" value="" id="to_email" class="form-control" name="to_email" required>
                    </div>

                    <div class="form-group">
                        <label> Subject </label>
                        <input type="" value="" id="subject" class="form-control" name="subject">
                    </div>

                    <div class="form-group">
                        <label> Message </label>
                        <textarea class="form-control" rows="5" id="message" required></textarea>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success" id="create-message">Send</button>
                    </div>
        </div>
    </div>

{include file='common/footer.tpl'}
