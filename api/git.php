<?php
header('Content-Type: application/json');
    require_once '../vendor/autoload.php';
    
    use Milo\Github;
    $api = new Github\Api;
    $githubData = [
        'commit' => [],
        'user' => [],
        'date' => []
    ];
	
	

	$response_prog = $api->get('/repos/:owner/:repo/commits', ['owner' => $_GET['owner'], 'repo' => $_GET['repo']]);
	
    $fullRepoData = $api->decode($response_prog);
 
	$user=$fullRepoData[count($fullRepoData)-1]->author->login;
	$commit = $fullRepoData[count($fullRepoData)-1]->commit->message;
	$date = $fullRepoData[count($fullRepoData)-1]->commit->author->date;
	$githubData['commit']=$commit;
	$githubData['user']=$user;
	$githubData['date']=$date;
    
//      $repo = [
//         'id' => $fullRepoData->id,
// 		'name' => $fullRepoData->name,
//  		'full_name' => $fullRepoData->full_name,
//  		'description' => $fullRepoData->description,
// 		'html_url' => $fullRepoData->html_url,
// 	    'star_count' => $fullRepoData->stargazers_count,
//  		'fork_count' => $fullRepoData->forks,
//  		'watchers_count' => $fullRepoData->subscribers_count,
//  		'owner_id' =>$fullRepoData->owner->id
// 	 ];
	 
//      $owner = $fullRepoData->owner;
//      	$user = [
//      		'login' => $owner->login,
//      		'id' => $owner->id,
//      		'avatar_url' => $owner->avatar_url,
//      		'url' => $owner->url,
//      		'html_url' => $owner->html_url,
//      	];
//      $githubData['repository'][] = $repo;
//      $githubData['user'][$owner->id] = $user;
//      $contributorsResponse = $api->get('/repos/:owner/:repo/contributors', ['owner' => $fullRepoData->owner->login, 'repo' => $fullRepoData->name]);	
//      $contributorsData = $api->decode($contributorsResponse);
// // 	//print_r($contributorsData);
// 	foreach($contributorsData as $c) {
// 		$contributor = [
// 			'login' => $c->login,
// 			'id' => $c->id,
// 			'avatar_url' => $c->avatar_url,
// 			'url' => $c->url,
// 			'html_url' => $c->html_url,
// 		];
 
// 		if(!isset($githubData['user'][$c->id]))$githubData['user'][$c->id] = $contributor;
// 		$githubData['contributors'][] = [
// 			'user_id' => $c->id,
// 			'repo_id' => $fullRepoData->id,
// 			'contributions' => $c->contributions
// 		];
 
// 	}
    echo json_encode($githubData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>