@layout('admin::layouts.main')

@section('page_title')
| Users - Edit User
@endsection

@section('scripts')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')	
<div class="row-fluid">
	<div class="span3">
		@include('admin::users.sidenav')
	</div>
    <div class="span9">
    	<h2>Edit Account for <?=$user->first_name . ' ' . $user->last_name; ?></h2>
    	<hr>
		<?php echo Form::open($controller_alias . '/update/' . $user->id, null, array('class' => 'form-horizontal') ); ?>
			<fieldset>	
						
				<div class="control-group{{ isset($errors) && $errors->has('first_name') ? ' error' : '' }}">
					<div class="control-group">
						<?php echo Form::label('first_name', 'First Name *', array('class' => 'control-label')); ?>
						<div class="controls">
							<?php
								echo Form::text('first_name', Input::old('first_name') ? Input::old('first_name') : $user->first_name, array('class' => 'span6', 'required' => 'required', 'placeholder' => 'Enter First Name'));
							?>
							@if ($errors && $errors->has('first_name'))
								<span class="help-inline">This field is required</span>
							@endif
						</div>
					</div>
				</div>

				<div class="control-group{{ isset($errors) && $errors->has('last_name') ? ' error' : '' }}">
					<div class="control-group">
						<?php echo Form::label('last_name', 'Last Name *', array('class' => 'control-label')); ?>
						<div class="controls">
							<?php
								echo Form::text('last_name', Input::old('last_name') ? Input::old('last_name') : $user->last_name, array('class' => 'span6', 'required' => 'required', 'placeholder' => 'Enter Last Name'));
							?>
							@if ($errors && $errors->has('last_name'))
								<span class="help-inline">This field is required</span>
							@endif
						</div>
					</div>
				</div>


				<div class="control-group{{ isset($errors) && $errors->has('username') ? ' error' : '' }}">
					<div class="control-group">
						<?php echo Form::label('username', 'Username *', array('class' => 'control-label')); ?>
						<div class="controls">
							<?php
								echo Form::text('username', Input::old('username') ? Input::old('username') : $user->username, array('class' => 'span6', 'required' => 'required', 'placeholder' => 'Enter Username'));
							?>
							@if ($errors && $errors->has('username'))
								<span class="help-inline">This field is required</span>
							@endif
						</div>
					</div>
				</div>
				
				<div class="control-group{{ isset($errors) && $errors->has('email') ? ' error' : '' }}">
					<div class="control-group">
						<?php echo Form::label('email', 'Email *', array('class' => 'control-label')); ?>
						<div class="controls">
							<?php
								echo Form::email('email', Input::old('email') ? Input::old('email') : $user->email, array('class' => 'span6', 'required' => 'required', 'placeholder' => 'Enter New Email Address'));
							?>
							@if ($errors && $errors->has('email'))
								<span class="help-inline">This field is required</span>
							@endif
						</div>
					</div>
				</div>

                <div class="control-group{{ isset($errors) && $errors->has('groups[]') ? ' error' : '' }}">
                    <?php echo Form::label('groups[]', 'User Group *', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?
                        $old_values = array();
                        if (!empty($user->groups)) {
                        	foreach ($user->groups as $t) {
                        		$old_values[] = $t->id;
                        	};
                        }
                        $select_options = array('' => 'Choose User Groups');
                        if(!empty($groups)) {
                            foreach($groups as $obj) {
                                $select_options[$obj->id] = $obj->name;
                            }
                        }
                        echo Form::select('groups[]', $select_options, Input::old('groups') ? Input::old('groups') : $old_values, array('style' => 'height:200px;', 'class' => 'span6', 'required' => 'required', 'multiple' => 'multiple'));
                        ?>
                        @if ($errors && $errors->has('groups[]'))
                            <span class="help-inline">This field is required</span>
                        @endif
                    </div>
                </div>

				<?
				if (!empty($user->user_metadata->attributes)):
					foreach($user->user_metadata->attributes as $meta_name => $meta_value): 
				?>
						<? if (in_array($meta_name, array('bio'))): ?>
							<div class="control-group">
								<div class="control-group">
									<?=Form::label('user_metadata[' . $meta_name . ']', ucwords(str_replace('_', ' ', $meta_name)), array('class' => 'control-label')); ?>
									<div class="controls">
										<?=Form::textarea('user_metadata[' . $meta_name . ']', Input::old('user_metadata.' . $meta_name) ? Input::old('user_metadata.' . $meta_name) : $meta_value, array('class' => 'span12 ckeditor', 'style' => 'height: 200px;', 'placeholder' => 'Enter ' . ucwords(str_replace('_', ' ', $meta_name))));?>
									</div>
								</div>
							</div>
						<? elseif (!in_array($meta_name, array('id', 'user_id', 'avatar', 'avatar_small'))): ?>
							<div class="control-group">
								<div class="control-group">
									<?=Form::label('user_metadata[' . $meta_name . ']', ucwords(str_replace('_', ' ', $meta_name)), array('class' => 'control-label')); ?>
									<div class="controls">
										<?=Form::text('user_metadata[' . $meta_name . ']', Input::old('user_metadata.' . $meta_name) ? Input::old('user_metadata.' . $meta_name) : $meta_value, array('class' => 'span6', 'placeholder' => 'Enter ' . ucwords(str_replace('_', ' ', $meta_name))));?>
									</div>
								</div>
							</div>
                        <? elseif(in_array($meta_name, array('avatar'))): ?>
                            <div class="control-group">
                                <div class="control-group">
                                	<label class="control-label">Avatar</label>
                                	<div class="controls">
	                                    <? if (!empty($meta_value)): ?>
	                                        <a href="<?=$meta_value;?>" target="_blank"><img src="<?=$meta_value;?>" class="img-polaroid" alt="Avatar" style="max-width:100px;"></a>
	                                    <? else: ?>
	                                        No Image Uploaded
	                                    <? endif; ?>
	                                    <a href="<?=$admin_alias;?>/users/edit_avatar/<?=$user->id;?>">Change/Upload Avatar</a>
                                	</div>
                                </div>
                            </div>
				<?
						endif;
					endforeach;
				endif;
				?>
				
				<div class="form-actions">
					<button type="submit" name="submit" value="1" class="btn btn-success">Update</button>
				</div>
				<?php echo Form::token(); ?>
			</fieldset>
   		<?php echo Form::close(); ?>	
    </div>
</div>
@endsection