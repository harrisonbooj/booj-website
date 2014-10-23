<?php

class Wm_Home_Controller extends Wm_Base_Controller {

    public function get_index() {
        return View::make('wm::index');
    }


    public function post_index() {
        $input = Input::except(array('csrf_token', 'Send'));

        $rules = array(
            'full_name'  => 'required',
            'email' => 'required|email',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to_action('@index')->with_input()->with_errors($validation);
        } else {
            Bundle::start('swiftmailer');
            $args['form_data'] = $input;
            $html = View::make('wm::contact.contact', $args);
            $mailer = IoC::resolve('mailer');
            $message = Swift_Message::newInstance('Information Request Form')
                                    ->setFrom(array($input['email'] => $input['full_name'] ))
                                    ->setTo(
                                        array('g@booj.com' => 'John', 'dyana@booj.com' => 'Dyana', 'harrisonw@activewebsite.com' => 'Harrison')
                                    )
                                    ->setBody($html,'text/html')
            ;
            $mailer->send($message);
            return Redirect::to_action('@index')->with('success_message', 'Thank you! Your message has been sent.');
        }
    }
}
