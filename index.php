<?php 
    ob_start();
    session_start();
	error_reporting(E_ALL); ini_set('display_errors', 1);
    // include required files form Facebook SDK
    // added in v4.0.5
    require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
    require_once( 'Facebook/HttpClients/FacebookCurl.php' );
    require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );

    // added in v4.0.0
    require_once( 'Facebook/FacebookSession.php' );
    require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
    require_once( 'Facebook/FacebookRequest.php' );
    require_once( 'Facebook/FacebookResponse.php' );
    require_once( 'Facebook/FacebookSDKException.php' );
    require_once( 'Facebook/FacebookRequestException.php' );
    require_once( 'Facebook/FacebookOtherException.php' );
    require_once( 'Facebook/FacebookAuthorizationException.php' );
    require_once( 'Facebook/GraphObject.php' );
    require_once( 'Facebook/GraphUser.php' );
    require_once( 'Facebook/GraphSessionInfo.php' );
	require_once('Facebook/Entities/AccessToken.php');
	require_once('Facebook/HttpClients/FacebookStreamHttpClient.php');
	require_once('Facebook/HttpClients/FacebookStream.php');  
  // added in v4.0.5
    use Facebook\FacebookHttpable;
    use Facebook\FacebookCurl;
    use Facebook\FacebookCurlHttpClient;
    // added in v4.0.0
    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookOtherException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphObject;
    use Facebook\GraphUser;
    use Facebook\GraphSessionInfo;

    //2.Use app id,secret and redirect url
     $app_id = 'appid';
     $app_secret = 'secret';
     $redirect_url='http://www.tangelotown.org/facebook/index.php';
     
     //3.Initialize application, create helper object and get fb sess
     FacebookSession::setDefaultApplication($app_id,$app_secret);
     $helper = new FacebookRedirectLoginHelper($redirect_url);
    try {
        $session = $helper->getSessionFromRedirect();
    } catch(FacebookRequestException $ex) {
        // When Facebook returns an error
    } catch(\Exception $ex) {
        // When validation fails or other local issues
    }
    if ($session) {

  try {

    $user_profile = (new FacebookRequest(
      $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());

    echo "Name: " . $user_profile->getName();

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }       }else{
        //else echo login
        echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';
    }
