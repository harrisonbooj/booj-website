<?php
use Blog\Models\Post as Post;
use \Laravel\Config as Config;

class Blog_Notifications_Controller extends Blog_Base_Controller {
    
    public function post_new_comment($post_id)
    {       
        $disqusApiSecret = Config::get('Blog::blog.disgus_key');

        $commentId = isset($_POST['comment']) ? $_POST['comment'] : false;

        $postId = $post_id;

        $post = Post::with(array('user'))->where('id', '=', $postId)->first();

        $postAuthor = $post->user->email; 

        if ($commentId === false || strlen($postAuthor) < 4) {
            return Response::error('500');
        }

        $session = curl_init('http://disqus.com/api/3.0/posts/details.json?api_secret=' . $disqusApiSecret .'&post=' . $commentId . '&related=thread');

        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($session);

        curl_close($session);

        $results = json_decode($result);

        if ($results === NULL) {
            return Response::error('500');
        }

        $author = $results->response->author;

        $thread = $results->response->thread;

        $comment = $results->response->raw_message;

        $subject = Config::get('Blog::blog.blog_name') . ': New comment on ' . $thread->title;

		$messageHTML = '<h3>' . Config::get('Blog::blog.blog_name') . ' Comment</h3><h3>A comment was posted on <a href="' . $thread->link . '#comment-' . $commentId . '">' . $thread->title . '</a></h3><p>' . $author->name . ' wrote:</p><blockquote>' . $comment .'</blockquote><p><a href="http://' . $results->response->forum . '.disqus.com/admin/moderate/#/approved/search/id:' . $commentId . '">Moderate comment</a></p>';

		// Begin SwiftMailer Building
		Bundle::start('swiftmailer');

		// Get the instance
		$mailer = IoC::resolve('mailer');

		// Construct the message
		$message = Swift_Message::newInstance($subject)
			->setFrom(array(Config::get('Admin::admin.admin_email') => Config::get('Admin::admin.admin_name')))
			->setTo(array($postAuthor => $post->user->first_name . ' ' . $post->user->last_name, 'marketing@booj.com' => 'Booj Marketing'))
			->setBody($messageHTML, 'text/html');

		// Send the email
		$mailer->send($message);

        return Response::json(array('success' => 'true'));
    }
}