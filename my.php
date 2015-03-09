<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
 /* INCLUSION OF LIBRARY FILEs*/
	require_once( 'lib/Facebook/FacebookSession.php');
	require_once( 'lib/Facebook/FacebookRequest.php' );
	require_once( 'lib/Facebook/FacebookResponse.php' );
	require_once( 'lib/Facebook/FacebookSDKException.php' );
	require_once( 'lib/Facebook/FacebookRequestException.php' );
	require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
	require_once( 'lib/Facebook/GraphObject.php' );
	require_once( 'lib/Facebook/GraphUser.php' );
	require_once( 'lib/Facebook/GraphSessionInfo.php' );
	require_once( 'lib/Facebook/Entities/AccessToken.php');
  require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'lib/Facebook/HttpClients/FacebookStream.php' );
	require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
  require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
  require_once( 'lib/Facebook/HttpClients/FacebookStreamHttpClient.php');
  require_once( 'lib/Facebook/HttpClients/FacebookGuzzleHttpClient.php');
	

/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;
  session_start();
  $app_id = '939794722706691';
   $app_secret = '3e23293871d1998861641bd22238e658';
   $redirect_url='http://www.tangelotown.org/facebook/my.php';
   
   //3.Initialize application, create helper object and get fb sess
   FacebookSession::setDefaultApplication($app_id,$app_secret);
  $helper = new FacebookRedirectLoginHelper($redirect_url);
  // $loginUrl = $helper->getLoginUrl();
 // $helper = new FacebookRedirectLoginHelper();
   // try {
    // $session = $helper->getSessionFromRedirect();
   // } catch(FacebookRequestException $ex) {
   //    echo "Facebook returns an error";
   //   // When Facebook returns an error
   // } catch(\Exception $ex) {
   //   // When validation fails or other local issues
   //  echo "There is a validation error.";
   // }
   if ($session) {
      echo 'session is set';
   }
   else
   {
    echo 'Session is not set';
   }
