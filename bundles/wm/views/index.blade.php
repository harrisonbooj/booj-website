@layout('wm::layouts.layout')

@section('page_title')
@if (!empty($page_data->meta_title))
| {{ strtolower($page_data->meta_title) }}
@elseif (!empty($page_data->pretty_name))
| {{ strtolower($page_data->pretty_name) }}
@endif
@endsection

@section('page_description')
@if (!empty($page_data->meta_description))
{{ $page_data->meta_description }}
@endif
@endsection

@section('page_keywords')
@if (!empty($page_data->meta_keyword))
{{ $page_data->meta_keyword }}
@endif
@endsection

@section('content')
<div id="investment-section" class="row-fluid">
    <div class="span8">
        @if (!empty($page_data->cmspage->content))
            {{ $page_data->cmspage->content }}
        @endif

        <h2>improve your return on investment</h2>

        <h3>when you are short on time and resources, call booj</h3>

        <p>If you are needing a marketing partner who can provide you with advanced reporting metrics informing you of where you are making the biggest impact call booj.</p>

        <p>Since 2014, Waste Management has continued to turn to booj (formerly Active Website) for various marketing efforts, online tools and training due to our ability to track results. booj is a technical marketing firm with a passion for new technology and innovation working to help you reach more customers and increase their lifetime investment. Armed with the knowledge of backend programming, web trends, design, SEO strategies, content writing and marketing booj can assist you with any project including:</p>
        <br />

        <div class="row-fluid">
            <div class="span6 info-block"><img alt="Design" class="grayscale" src="/uploads/images/info-box-design.jpg" />
                <h3>design</h3>
            </div>

            <div class="span6 info-block"><img alt="Training" class="grayscale" src="/uploads/images/info-box-training.jpg" />
                <h3>training</h3>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6 info-block"><img alt="Advanced ROI Metrics" class="grayscale" src="/uploads/images/info-box-metrics.jpg" />
                <h3>advanced ROI metrics</h3>
            </div>

            <div class="span6 info-block"><img alt="Web Solutions" class="grayscale" src="/uploads/images/info-box-web.jpg" />
                <h3>web solutions</h3>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6 info-block"><img alt="Mobile Solutions" class="grayscale" src="/uploads/images/info-box-mobile.jpg" />
                <h3>mobile solutions</h3>
            </div>

            <div class="span6 info-block"><img alt="Video" class="grayscale" src="/uploads/images/info-box-video.jpg" />
                <h3>video</h3>
            </div>
        </div>
    </div>
    <div id="investment-section-right" class="span4">
        <h3>to receive more information, complete the form below</h3>
        <p>alternatively, you can email WM@booj.com or call 800-976-9300.</p>
    	<?php
    		$success_message = Session::get('success_message');
	    	if ($success_message) {
	    		echo '<div class="alert alert-block alert-success">' . $success_message . '</div>';
	    	}
    	?>
        <?=Form::open(null, null, array('class' => '') ); ?>
            <h4>contact info:</h4>
            <div class="control-group {{ isset($errors) && $errors->has('full_name') ? 'error' : '' }}">
                <?=Form::label('full_name', 'Full Name', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?=Form::text('full_name', Input::old('full_name'), array('class' => 'span12', 'placeholder' => 'enter your full name', 'required' => 'required'));	?>
                    @if ($errors && $errors->has('full_name'))
                        <span class="help-block">This field is required</span>
                    @endif
                </div>
            </div>

            <div class="control-group">
                <?=Form::label('phone', 'Phone', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?=Form::text('phone', Input::old('phone'), array('class' => 'span12', 'placeholder' => 'enter your phone number')); ?>
                </div>
            </div>

            <div class="control-group {{ isset($errors) && $errors->has('email') ? 'error' : '' }}">
                <?=Form::label('email', 'E-Mail', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?=Form::email('email', Input::old('email'), array('class' => 'span12', 'placeholder' => 'enter your email address', 'required' => 'required')); ?>
                    @if ($errors && $errors->has('email'))
                        <span class="help-block">This field is required</span>
                    @endif
                </div>
            </div>

            <h4>I would like more information about:</h4>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('training_course', Input::old('training_course')); ?>
                    <?=Form::label('training_course', 'available online training courses', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('compliance_training', Input::old('compliance_training')); ?>
                    <?=Form::label('compliance_training', 'compliance training', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('copywriting', Input::old('copywriting')); ?>
                    <?=Form::label('copywriting', 'copywriting', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('promotional_items', Input::old('promotional_items')); ?>
                    <?=Form::label('promotional_items', 'custom promotional items', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('surveys', Input::old('surveys')); ?>
                    <?=Form::label('surveys', 'customer surveys', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('email_marketing', Input::old('email_marketing')); ?>
                    <?=Form::label('email_marketing', 'email marketing solutions', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('fact_sheet', Input::old('fact_sheet')); ?>
                    <?=Form::label('fact_sheet', 'facility fact sheet creation', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('sales_training', Input::old('sales_training')); ?>
                    <?=Form::label('sales_training', 'IAM/sales training', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('lead_generation', Input::old('lead_generation')); ?>
                    <?=Form::label('lead_generation', 'lead generation', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('new_service_promotion', Input::old('new_service_promotion')); ?>
                    <?=Form::label('new_service_promotion', 'new service promotion', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('rcra_training', Input::old('rcra_training')); ?>
                    <?=Form::label('rcra_training', 'RCRA training', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('service_brochure', Input::old('service_brochure')); ?>
                    <?=Form::label('service_brochure', 'service brochure creation', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('signage', Input::old('signage')); ?>
                    <?=Form::label('signage', 'signage', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('open_close_tools', Input::old('open_close_tools')); ?>
                    <?=Form::label('open_close_tools', 'site open and closure tools', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('site_emails', Input::old('site_emails')); ?>
                    <?=Form::label('site_emails', 'site-specific emails', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('tradeshow_support', Input::old('tradeshow_support')); ?>
                    <?=Form::label('tradeshow_support', 'tradeshow materials and support', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('video', Input::old('video')); ?>
                    <?=Form::label('video', 'video production', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?=Form::checkbox('web_tools', Input::old('web_tools')); ?>
                    <?=Form::label('web_tools', 'web solutions and tools', array('class' => 'control-label')); ?>
                </div>
            </div>
            <div class="control-group">
                <?=Form::checkbox('other', Input::old('other')); ?>
                <?=Form::label('other', 'other', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?=Form::text('other', Input::old('other'), array('class' => 'span12', 'placeholder' => 'other items')); ?>
                </div>
            </div>
            <h4>I would also like to mention</h4>
            <div class="control-group {{ isset($errors) && $errors->has('message') ? 'error' : '' }}">
                <?=Form::label('message', 'I would also like to mention:', array('class' => 'control-label hidden')); ?>
                <div class="controls">
                    <?=Form::textarea('message', Input::old('message'), array('class' => 'span12', 'placeholder' => 'other things to mention', 'rows' => '3')); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" name="Send" value="send" class="btn btn-primary">
                </div>
            </div>
        <?=Form::token(); ?>

        <?=Form::close(); ?>
    </div>
</div>
@endsection

@if (!empty($page_data->cmspage->styles))
@section('styles')
    {{ $page_data->cmspage->styles }}
@endsection
@endif


@if (!empty($page_data->cmspage->scripts))
@section('scripts')
    {{ $page_data->cmspage->scripts }}

@endsection
@endif

