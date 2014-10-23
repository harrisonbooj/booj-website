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

        <p>For over a decade, Waste Management has turned to booj for integrated marketing campaigns, online tools and training. We are the power behind WMSolutions.com and not only manage the integrated workflow of over $1.4 billion in revenue, but have increased efficiencies through technology enhancements.</p>

        <p><a href="//fast.wistia.net/embed/iframe/gz52zw2q7o?popover=true" class="wistia-popover[height=360,playerColor=7b796a,width=640]">Watch how booj has made an impact on WMSolutions.com's bottom line.</a>
           <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script></p>

        <p>booj is a technical marketing firm with a passion for new technology, innovation and tracking metrics. Armed with the knowledge of backend programming, web trends, design, search engine optimization strategies, content writing and marketing booj can assist you with any project including:</p>
        <br />

        <div class="row-fluid">
            <div class="span6 info-block"><img alt="Design" class="grayscale" src="/img/wm/info-box-design.jpg" />
                <h3>design</h3>
            </div>

            <div class="span6 info-block"><img alt="Training" class="grayscale" src="/img/wm/info-box-training.jpg" />
                <h3>training</h3>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6 info-block"><img alt="Advanced ROI Metrics" class="grayscale" src="/img/wm/info-box-metrics.jpg" />
                <h3>advanced ROI metrics</h3>
            </div>

            <div class="span6 info-block"><img alt="Web Solutions" class="grayscale" src="/img/wm/info-box-web.jpg" />
                <h3>web solutions</h3>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6 info-block"><img alt="Mobile Solutions" class="grayscale" src="/img/wm/info-box-mobile.jpg" />
                <h3>mobile solutions</h3>
            </div>

            <div class="span6 info-block"><img alt="Video" class="grayscale" src="/img/wm/info-box-video.jpg" />
                <h3>video</h3>
            </div>
        </div>
    </div>
    <div id="investment-section-right" class="span4">
        <h3>receive more information, <br />call 855-976-9300</h3>
        <p>email <a href="mailto:WM@booj.com">WM@booj.com</a> or complete our form.</p>
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
                    <label>
                        <?=Form::checkbox('training_course', Input::old('training_course')); ?>
                        available online training courses
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('compliance_training', Input::old('compliance_training')); ?>
                        compliance training
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('copywriting', Input::old('copywriting')); ?>
                        copywriting
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('promotional_items', Input::old('promotional_items')); ?>
                        custom promotional items
                    <label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('surveys', Input::old('surveys')); ?>
                        customer surveys
                    <label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('email_marketing', Input::old('email_marketing')); ?>
                        email marketing solutions
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('fact_sheet', Input::old('fact_sheet')); ?>
                        facility fact sheet creation
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('sales_training', Input::old('sales_training')); ?>
                        IAM/sales training
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('lead_generation', Input::old('lead_generation')); ?>
                        lead generation
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('new_service_promotion', Input::old('new_service_promotion')); ?>
                        new service promotion
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('rcra_training', Input::old('rcra_training')); ?>
                        RCRA training
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('service_brochure', Input::old('service_brochure')); ?>
                        service brochure creation
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('signage', Input::old('signage')); ?>
                        signage
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('open_close_tools', Input::old('open_close_tools')); ?>
                        site open and closure tools
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('site_emails', Input::old('site_emails')); ?>
                        site-specific emails
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('tradeshow_support', Input::old('tradeshow_support')); ?>
                        tradeshow materials and support
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('video', Input::old('video')); ?>
                        video production
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>
                        <?=Form::checkbox('web_tools', Input::old('web_tools')); ?>
                        web solutions and tools
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label id="other">
                    <?=Form::checkbox('other', Input::old('other')); ?>
                    other
                </label>
                <div id="other" class="controls">
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

